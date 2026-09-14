<?php

namespace App\Http\Controllers\Apprentice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Academic\Apprentice;
use App\Models\Academic\Course;
use App\Models\Resource\Computer;

class PortalController extends Controller
{
    public function index(Request $request){

        $query = trim($request->query('q', ''));

        $apprentices = Apprentice::query()
            ->when($query !== '', function ($builder) use ($query) {
                $builder->where(function ($builder) use ($query) {
                    $builder->where('id', 'like', "%{$query}%")
                        ->orWhere('name_apren', 'like', "%{$query}%")
                        ->orWhere('email', 'like', "%{$query}%")
                        ->orWhere('cell', 'like', "%{$query}%");
                });
            })
            ->orderBy('id')
            ->paginate(10)
            ->withQueryString();

        return view('apprentice.index',compact('apprentices'));

    }

    public function create (){
        $courses = Course::all();
        $computers = Computer::all();

        return view('apprentice.create', compact('courses', 'computers'));
    }

    public function apiIndex()
    {
        return response()->json(Apprentice::orderBy('id')->get());
    }

    public function apiShow(Apprentice $apprentice)
    {
        return response()->json($apprentice->load(['program', 'course', 'computer', 'person', 'intake', 'enrollment']));
    }

    public function apiStore(Request $request)
    {
        $data = $request->validate([
            'persona_id' => ['nullable', 'exists:personas,id'],
            'convocatoria_id' => ['nullable', 'exists:convocatorias,id'],
            'inscripcion_id' => ['nullable', 'exists:inscripciones,id'],
            'codigo_matricula' => ['nullable', 'string', 'max:50'],
            'estado_academico' => ['nullable', 'string', 'max:50'],
            'fecha_matricula' => ['nullable', 'date'],
            'fase_formativa' => ['nullable', 'string', 'max:50'],
            'name_apren' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'cell' => ['required', 'string', 'max:255'],
            'program_id' => ['nullable', 'exists:programs,id'],
            'course_id' => ['nullable', 'exists:courses,id'],
            'computer_id' => ['nullable', 'exists:computers,id'],
        ]);

        return response()->json(Apprentice::create($data), 201);
    }

    public function apiUpdate(Request $request, Apprentice $apprentice)
    {
        $data = $request->validate([
            'persona_id' => ['nullable', 'exists:personas,id'],
            'convocatoria_id' => ['nullable', 'exists:convocatorias,id'],
            'inscripcion_id' => ['nullable', 'exists:inscripciones,id'],
            'codigo_matricula' => ['nullable', 'string', 'max:50'],
            'estado_academico' => ['nullable', 'string', 'max:50'],
            'fecha_matricula' => ['nullable', 'date'],
            'fase_formativa' => ['nullable', 'string', 'max:50'],
            'name_apren' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'cell' => ['required', 'string', 'max:255'],
            'program_id' => ['nullable', 'exists:programs,id'],
            'course_id' => ['nullable', 'exists:courses,id'],
            'computer_id' => ['nullable', 'exists:computers,id'],
        ]);

        $apprentice->update($data);

        return response()->json($apprentice->fresh());
    }

    public function apiDestroy(Apprentice $apprentice)
    {
        $apprentice->delete();

        return response()->noContent();
    }

    public function store(Request $request)
    {
        $apprentice = Apprentice::create($request->all());
        $file=$request->file("urlFoto");

        if ($file) {
            $nombreArchivo = "foto_".time().".".$file->guessExtension();
            $request->file('urlFoto')->storeAs('public/images', $nombreArchivo );

            $apprentice->urlFoto = $nombreArchivo;
            $apprentice->save();
        }

        return redirect()->route('apprentice.index');
    }

    public function edit(Apprentice $apprentice)
    {
        $courses = Course::all();
        $computers = Computer::all();

        return view('apprentice.edit', compact('apprentice', 'courses', 'computers'));
    }

    public function update(Request $request, Apprentice $apprentice)
    {
        $apprentice->update($request->all());

        return redirect()->route('apprentice.index');
    }

    public function destroy(Apprentice $apprentice)
    {
        $apprentice->delete();

        return redirect()->route('apprentice.index');
    }
}
