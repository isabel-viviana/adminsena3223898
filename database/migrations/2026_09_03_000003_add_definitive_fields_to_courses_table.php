<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            if (!Schema::hasColumn('courses', 'codigo_programa')) {
                $table->string('codigo_programa', 50)->nullable()->after('name_curso');
            }
            if (!Schema::hasColumn('courses', 'nivel_id')) {
                $table->foreignId('nivel_id')->nullable()->after('codigo_programa')->constrained('niveles_formacion')->nullOnDelete();
            }
            if (!Schema::hasColumn('courses', 'version_programa')) {
                $table->string('version_programa', 20)->default('1')->after('nivel_id');
            }
            if (!Schema::hasColumn('courses', 'duracion_horas_totales')) {
                $table->unsignedInteger('duracion_horas_totales')->nullable()->after('version_programa');
            }
            if (!Schema::hasColumn('courses', 'perfil_ingreso')) {
                $table->text('perfil_ingreso')->nullable()->after('duracion_horas_totales');
            }
        });
    }

    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $columnsToDrop = [];
            if (Schema::hasColumn('courses', 'nivel_id')) {
                $table->dropForeign(['nivel_id']);
                $columnsToDrop[] = 'nivel_id';
            }
            if (Schema::hasColumn('courses', 'codigo_programa')) {
                $columnsToDrop[] = 'codigo_programa';
            }
            if (Schema::hasColumn('courses', 'version_programa')) {
                $columnsToDrop[] = 'version_programa';
            }
            if (Schema::hasColumn('courses', 'duracion_horas_totales')) {
                $columnsToDrop[] = 'duracion_horas_totales';
            }
            if (Schema::hasColumn('courses', 'perfil_ingreso')) {
                $columnsToDrop[] = 'perfil_ingreso';
            }
            if (!empty($columnsToDrop)) {
                $table->dropColumn($columnsToDrop);
            }
        });
    }
};
