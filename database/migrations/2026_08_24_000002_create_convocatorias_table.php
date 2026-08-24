<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('convocatorias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('courses')->restrictOnDelete();
            $table->foreignId('training_center_id')->constrained('training_centers')->restrictOnDelete();
            $table->enum('schedule', ['Mañana', 'Tarde', 'Noche']);
            $table->enum('modality', ['Presencial', 'Virtual', 'Mixta']);
            $table->unsignedInteger('quota');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['Abierta', 'Cerrada', 'Finalizada'])->default('Abierta');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('convocatorias');
    }
};
