<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('convocatorias', function (Blueprint $table) {
            if (!Schema::hasColumn('convocatorias', 'numero_ficha')) {
                $table->string('numero_ficha', 50)->nullable()->unique()->after('id');
            }
            if (!Schema::hasColumn('convocatorias', 'codigo_convocatoria')) {
                $table->string('codigo_convocatoria', 50)->nullable()->after('numero_ficha');
            }
            if (!Schema::hasColumn('convocatorias', 'jornada_id')) {
                $table->foreignId('jornada_id')->nullable()->after('training_center_id')->constrained('jornadas')->nullOnDelete();
            }
            if (!Schema::hasColumn('convocatorias', 'modalidad_id')) {
                $table->foreignId('modalidad_id')->nullable()->after('jornada_id')->constrained('modalidades')->nullOnDelete();
            }
            if (!Schema::hasColumn('convocatorias', 'teacher_id')) {
                $table->foreignId('teacher_id')->nullable()->after('modalidad_id')->constrained('teachers')->nullOnDelete();
            }
        });

        // Safe migration of existing schedule/modality values if present
        if (Schema::hasTable('jornadas') && Schema::hasColumn('convocatorias', 'schedule')) {
            $jornadasMap = DB::table('jornadas')->pluck('id', 'nombre')->toArray();
            if (!empty($jornadasMap)) {
                $convocatorias = DB::table('convocatorias')->get();
                foreach ($convocatorias as $conv) {
                    $jornadaNombre = $conv->schedule ?? null;
                    $jornadaId = $jornadasMap[$jornadaNombre] ?? null;
                    if ($jornadaId) {
                        DB::table('convocatorias')->where('id', $conv->id)->update(['jornada_id' => $jornadaId]);
                    }
                }
            }
        }

        if (Schema::hasTable('modalidades') && Schema::hasColumn('convocatorias', 'modality')) {
            $modalidadesMap = DB::table('modalidades')->pluck('id', 'nombre')->toArray();
            if (!empty($modalidadesMap)) {
                $convocatorias = DB::table('convocatorias')->get();
                foreach ($convocatorias as $conv) {
                    $modalidadNombre = $conv->modality ?? null;
                    $modalidadId = $modalidadesMap[$modalidadNombre] ?? null;
                    if ($modalidadId) {
                        DB::table('convocatorias')->where('id', $conv->id)->update(['modalidad_id' => $modalidadId]);
                    }
                }
            }
        }

        Schema::table('convocatorias', function (Blueprint $table) {
            $columnsToDrop = [];
            if (Schema::hasColumn('convocatorias', 'schedule')) {
                $columnsToDrop[] = 'schedule';
            }
            if (Schema::hasColumn('convocatorias', 'modality')) {
                $columnsToDrop[] = 'modality';
            }
            if (!empty($columnsToDrop)) {
                $table->dropColumn($columnsToDrop);
            }
        });
    }

    public function down(): void
    {
        Schema::table('convocatorias', function (Blueprint $table) {
            if (!Schema::hasColumn('convocatorias', 'schedule')) {
                $table->enum('schedule', ['Mañana', 'Tarde', 'Noche'])->default('Mañana')->after('training_center_id');
            }
            if (!Schema::hasColumn('convocatorias', 'modality')) {
                $table->enum('modality', ['Presencial', 'Virtual', 'Mixta'])->default('Presencial')->after('schedule');
            }

            if (Schema::hasColumn('convocatorias', 'teacher_id')) {
                $table->dropForeign(['teacher_id']);
                $table->dropColumn('teacher_id');
            }
            if (Schema::hasColumn('convocatorias', 'modalidad_id')) {
                $table->dropForeign(['modalidad_id']);
                $table->dropColumn('modalidad_id');
            }
            if (Schema::hasColumn('convocatorias', 'jornada_id')) {
                $table->dropForeign(['jornada_id']);
                $table->dropColumn('jornada_id');
            }
            if (Schema::hasColumn('convocatorias', 'codigo_convocatoria')) {
                $table->dropColumn('codigo_convocatoria');
            }
            if (Schema::hasColumn('convocatorias', 'numero_ficha')) {
                $table->dropUnique(['numero_ficha']);
                $table->dropColumn('numero_ficha');
            }
        });
    }
};
