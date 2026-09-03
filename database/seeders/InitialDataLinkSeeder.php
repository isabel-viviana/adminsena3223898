<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jornada;
use App\Models\Modalidad;
use App\Models\NivelFormacion;
use App\Models\Convocatoria;
use App\Models\Course;
use App\Models\User;
use App\Models\Persona;
use App\Models\Inscripcion;
use App\Models\Teacher;

class InitialDataLinkSeeder extends Seeder
{
    public function run(): void
    {
        $jornada = Jornada::where('nombre', 'Mañana')->first();
        $modalidad = Modalidad::where('nombre', 'Presencial')->first();

        Convocatoria::where('id', 1)->update([
            'jornada_id' => $jornada?->id,
            'modalidad_id' => $modalidad?->id,
            'numero_ficha' => '3223898-01',
            'codigo_convocatoria' => 'CONV-2026-01',
        ]);

        $nivel = NivelFormacion::where('nombre', 'Complementario')->first();
        Course::where('id', 2)->update([
            'nivel_id' => $nivel?->id,
            'codigo_programa' => 'PROG-3223899',
            'duracion_horas_totales' => 48,
        ]);

        // Link User 2 to Persona
        $user2 = User::find(2);
        if ($user2 && !Persona::where('user_id', 2)->exists()) {
            $persona = Persona::create([
                'user_id' => 2,
                'tipo_documento' => 'CC',
                'numero_documento' => '1000000002',
                'primer_nombre' => 'Aprendiz',
                'primer_apellido' => 'SENA',
                'correo_contacto' => $user2->email,
                'telefono' => '3001234567',
            ]);

            Inscripcion::where('id', 1)->update(['persona_id' => $persona->id]);
        }

        // Link Teacher to Persona
        $teacher = Teacher::first();
        if ($teacher && !$teacher->persona_id) {
            $docentePersona = Persona::firstOrCreate(
                ['numero_documento' => '1000000003'],
                [
                    'tipo_documento' => 'CC',
                    'primer_nombre' => $teacher->name ?: 'Instructor',
                    'primer_apellido' => 'SENA',
                    'correo_contacto' => $teacher->email,
                    'telefono' => '3109876543',
                ]
            );
            $teacher->update([
                'persona_id' => $docentePersona->id,
                'codigo_instructor' => 'INST-001',
                'especialidad' => 'Sistemas y Desarrollo Web',
            ]);
        }
    }
}
