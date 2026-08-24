<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->text('description')->nullable()->after('name_curso');
            $table->enum('level', ['Tecnico', 'Tecnologo', 'Complementario'])
                ->default('Complementario')
                ->after('description');
            $table->unsignedSmallInteger('duration')
                ->default(1)
                ->after('level');
        });
    }

    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn(['description', 'level', 'duration']);
        });
    }
};
