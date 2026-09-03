<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('teachers', function (Blueprint $table) {
            if (!Schema::hasColumn('teachers', 'persona_id')) {
                $table->foreignId('persona_id')->nullable()->after('id')->constrained('personas')->nullOnDelete();
            }
            if (!Schema::hasColumn('teachers', 'codigo_instructor')) {
                $table->string('codigo_instructor', 50)->nullable()->after('name');
            }
            if (!Schema::hasColumn('teachers', 'especialidad')) {
                $table->string('especialidad', 150)->nullable()->after('codigo_instructor');
            }
        });
    }

    public function down(): void
    {
        Schema::table('teachers', function (Blueprint $table) {
            $columnsToDrop = [];
            if (Schema::hasColumn('teachers', 'persona_id')) {
                $table->dropForeign(['persona_id']);
                $columnsToDrop[] = 'persona_id';
            }
            if (Schema::hasColumn('teachers', 'codigo_instructor')) {
                $columnsToDrop[] = 'codigo_instructor';
            }
            if (Schema::hasColumn('teachers', 'especialidad')) {
                $columnsToDrop[] = 'especialidad';
            }
            if (!empty($columnsToDrop)) {
                $table->dropColumn($columnsToDrop);
            }
        });
    }
};
