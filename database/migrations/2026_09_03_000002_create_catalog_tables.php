<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('niveles_formacion')) {
            Schema::create('niveles_formacion', function (Blueprint $table) {
                $table->id();
                $table->string('nombre', 100)->unique();
                $table->string('codigo', 50)->nullable();
                $table->unsignedSmallInteger('duracion_meses_estimada')->nullable();
                $table->boolean('estado')->default(true);
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('jornadas')) {
            Schema::create('jornadas', function (Blueprint $table) {
                $table->id();
                $table->string('nombre', 50)->unique();
                $table->string('codigo', 50)->nullable();
                $table->boolean('estado')->default(true);
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('modalidades')) {
            Schema::create('modalidades', function (Blueprint $table) {
                $table->id();
                $table->string('nombre', 50)->unique();
                $table->string('codigo', 50)->nullable();
                $table->boolean('estado')->default(true);
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('modalidades');
        Schema::dropIfExists('jornadas');
        Schema::dropIfExists('niveles_formacion');
    }
};
