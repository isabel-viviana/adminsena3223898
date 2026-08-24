<?php

namespace App\Http\Controllers;

use App\Models\Convocatoria;
use App\Models\Inscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InscripcionController extends Controller
{
    public function convocatorias()
    {
        $this->ensureApprentice();

        $convocatorias = Convocatoria::query()
            ->with(['course', 'trainingCenter'])
            ->where('status', 'Abierta')
            ->where('quota', '>', 0)
            ->orderBy('start_date')
            ->get();

        $inscritos = Inscripcion::query()
            ->where('user_id', Auth::id())
            ->where('status', 'Inscrito')
            ->pluck('convocatoria_id')
            ->all();

        return view('portal.convocatorias', compact('convocatorias', 'inscritos'));
    }

    public function misInscripciones()
    {
        $this->ensureApprentice();

        $inscripciones = Inscripcion::query()
            ->with(['convocatoria.course', 'convocatoria.trainingCenter'])
            ->where('user_id', Auth::id())
            ->latest('enrolled_at')
            ->get();

        return view('portal.mis_inscripciones', compact('inscripciones'));
    }

    public function comprobante(Inscripcion $inscripcion)
    {
        $this->ensureApprentice();
        abort_unless($inscripcion->user_id === Auth::id(), 403);

        $inscripcion->load(['user', 'convocatoria.course', 'convocatoria.trainingCenter']);

        return view('portal.comprobante', compact('inscripcion'));
    }

    public function store(Request $request, Convocatoria $convocatoria)
    {
        $this->ensureApprentice();

        DB::transaction(function () use ($convocatoria) {
            $convocatoria = Convocatoria::query()->lockForUpdate()->findOrFail($convocatoria->id);
            $inscripcion = Inscripcion::query()
                ->where('user_id', Auth::id())
                ->where('convocatoria_id', $convocatoria->id)
                ->first();

            if ($inscripcion && $inscripcion->status === 'Inscrito') {
                abort(422, 'Ya estás inscrito en esta convocatoria.');
            }

            if ($convocatoria->status !== 'Abierta') {
                abort(422, 'La convocatoria no está abierta.');
            }

            if ($convocatoria->quota < 1) {
                abort(422, 'No hay cupos disponibles.');
            }

            $convocatoria->decrement('quota');

            if ($inscripcion) {
                $inscripcion->update([
                    'status' => 'Inscrito',
                    'enrolled_at' => now(),
                ]);
            } else {
                Inscripcion::create([
                    'user_id' => Auth::id(),
                    'convocatoria_id' => $convocatoria->id,
                    'status' => 'Inscrito',
                    'enrolled_at' => now(),
                ]);
            }
        });

        return redirect()->route('portal.convocatorias')->with('success', 'Inscripción realizada correctamente.');
    }

    public function cancel(Inscripcion $inscripcion)
    {
        $this->ensureApprentice();

        abort_unless($inscripcion->user_id === Auth::id(), 403);

        DB::transaction(function () use ($inscripcion) {
            $inscripcion = Inscripcion::query()->lockForUpdate()->findOrFail($inscripcion->id);

            if ($inscripcion->status === 'Cancelado') {
                return;
            }

            $convocatoria = Convocatoria::query()->lockForUpdate()->findOrFail($inscripcion->convocatoria_id);
            $inscripcion->update(['status' => 'Cancelado']);
            $convocatoria->increment('quota');
        });

        return redirect()->route('portal.mis-inscripciones')->with('success', 'Inscripción cancelada correctamente.');
    }

    public function inscritos(Convocatoria $convocatoria)
    {
        $this->ensureAdmin();

        $inscripciones = Inscripcion::query()
            ->with('user')
            ->where('convocatoria_id', $convocatoria->id)
            ->orderByDesc('enrolled_at')
            ->get();

        return view('admin.convocatorias.inscritos', compact('convocatoria', 'inscripciones'));
    }

    public function updateStatus(Request $request, Inscripcion $inscripcion)
    {
        $this->ensureAdmin();

        $data = $request->validate([
            'status' => ['required', 'in:Inscrito,Aprobado,Cancelado'],
        ]);

        DB::transaction(function () use ($inscripcion, $data) {
            $inscripcion = Inscripcion::query()->lockForUpdate()->findOrFail($inscripcion->id);

            if ($inscripcion->status === $data['status']) {
                return;
            }

            $wasActive = in_array($inscripcion->status, ['Inscrito', 'Aprobado'], true);
            $willBeActive = in_array($data['status'], ['Inscrito', 'Aprobado'], true);
            $convocatoria = Convocatoria::query()->lockForUpdate()->findOrFail($inscripcion->convocatoria_id);

            if (! $wasActive && $willBeActive) {
                abort_if($convocatoria->quota < 1, 422, 'No hay cupos disponibles.');
                $convocatoria->decrement('quota');
            } elseif ($wasActive && ! $willBeActive) {
                $convocatoria->increment('quota');
            }

            $inscripcion->update(['status' => $data['status']]);
        });

        return back()->with('success', 'Estado actualizado correctamente.');
    }

    private function ensureApprentice(): void
    {
        if (! Auth::check()) {
            abort(403);
        }

        abort_unless(Auth::user()->role === 'aprendiz', 403);
    }

    private function ensureAdmin(): void
    {
        if (! Auth::check()) {
            abort(403);
        }

        abort_unless(Auth::user()->role === 'admin', 403);
    }
}
