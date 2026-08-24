<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("ALTER TABLE inscripciones MODIFY status ENUM('Inscrito', 'Aprobado', 'Cancelado') NOT NULL DEFAULT 'Inscrito'");
    }

    public function down(): void
    {
        DB::statement("UPDATE inscripciones SET status = 'Inscrito' WHERE status = 'Aprobado'");
        DB::statement("ALTER TABLE inscripciones MODIFY status ENUM('Inscrito', 'Cancelado') NOT NULL DEFAULT 'Inscrito'");
    }
};
