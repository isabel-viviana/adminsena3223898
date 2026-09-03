<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('apprentices', function (Blueprint $table) {
            if (!Schema::hasColumn('apprentices', 'persona_id')) {
                $table->foreignId('persona_id')->nullable()->after('id')->constrained('personas')->nullOnDelete();
            }
            if (!Schema::hasColumn('apprentices', 'convocatoria_id')) {
                $table->foreignId('convocatoria_id')->nullable()->after('persona_id')->constrained('convocatorias')->nullOnDelete();
            }
            if (!Schema::hasColumn('apprentices', 'inscripcion_id')) {
                $table->foreignId('inscripcion_id')->nullable()->after('convocatoria_id')->constrained('inscripciones')->nullOnDelete();
            }
            if (!Schema::hasColumn('apprentices', 'codigo_matricula')) {
                $table->string('codigo_matricula', 50)->nullable()->unique()->after('inscripcion_id');
            }
            if (!Schema::hasColumn('apprentices', 'estado_academico')) {
                $table->string('estado_academico', 50)->default('En formación')->after('codigo_matricula');
            }
            if (!Schema::hasColumn('apprentices', 'fecha_matricula')) {
                $table->date('fecha_matricula')->nullable()->after('estado_academico');
            }
            if (!Schema::hasColumn('apprentices', 'fase_formativa')) {
                $table->string('fase_formativa', 50)->nullable()->after('fecha_matricula');
            }
        });
    }

    public function down(): void
    {
        Schema::table('apprentices', function (Blueprint $table) {
            $columnsToDrop = [];
            if (Schema::hasColumn('apprentices', 'persona_id')) {
                $table->dropForeign(['persona_id']);
                $columnsToDrop[] = 'persona_id';
            }
            if (Schema::hasColumn('apprentices', 'convocatoria_id')) {
                $table->dropForeign(['convocatoria_id']);
                $columnsToDrop[] = 'convocatoria_id';
            }
            if (Schema::hasColumn('apprentices', 'inscripcion_id')) {
                $table->dropForeign(['inscripcion_id']);
                $columnsToDrop[] = 'inscripcion_id';
            }
            if (Schema::hasColumn('apprentices', 'codigo_matricula')) {
                $table->dropUnique(['codigo_matricula']);
                $columnsToDrop[] = 'codigo_matricula';
            }
            if (Schema::hasColumn('apprentices', 'estado_academico')) {
                $columnsToDrop[] = 'estado_academico';
            }
            if (Schema::hasColumn('apprentices', 'fecha_matricula')) {
                $columnsToDrop[] = 'fecha_matricula';
            }
            if (Schema::hasColumn('apprentices', 'fase_formativa')) {
                $columnsToDrop[] = 'fase_formativa';
            }
            if (!empty($columnsToDrop)) {
                $table->dropColumn($columnsToDrop);
            }
        });
    }
};
