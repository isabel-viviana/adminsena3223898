<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('inscripciones', function (Blueprint $table) {
            if (!Schema::hasColumn('inscripciones', 'persona_id')) {
                $table->foreignId('persona_id')->nullable()->after('id')->constrained('personas')->nullOnDelete();
            }
        });

        // Modify status to string or expanded enum to support SENA Sofia Plus standard statuses
        DB::statement("ALTER TABLE inscripciones MODIFY status VARCHAR(50) NOT NULL DEFAULT 'Registrada'");

        // Standardize existing records
        DB::table('inscripciones')->where('status', 'Inscrito')->update(['status' => 'Registrada']);
        DB::table('inscripciones')->where('status', 'Aprobado')->update(['status' => 'Admitida']);
        DB::table('inscripciones')->where('status', 'Cancelado')->update(['status' => 'Cancelada']);

        // Add unique constraint for (persona_id, convocatoria_id)
        Schema::table('inscripciones', function (Blueprint $table) {
            $table->unique(['persona_id', 'convocatoria_id'], 'inscripciones_persona_convocatoria_unique');
        });
    }

    public function down(): void
    {
        Schema::table('inscripciones', function (Blueprint $table) {
            $table->dropUnique('inscripciones_persona_convocatoria_unique');
            if (Schema::hasColumn('inscripciones', 'persona_id')) {
                $table->dropForeign(['persona_id']);
                $table->dropColumn('persona_id');
            }
        });

        DB::table('inscripciones')->where('status', 'Registrada')->update(['status' => 'Inscrito']);
        DB::table('inscripciones')->where('status', 'Admitida')->update(['status' => 'Aprobado']);
        DB::table('inscripciones')->where('status', 'Cancelada')->update(['status' => 'Cancelado']);
        DB::statement("ALTER TABLE inscripciones MODIFY status ENUM('Inscrito', 'Aprobado', 'Cancelado') NOT NULL DEFAULT 'Inscrito'");
    }
};
