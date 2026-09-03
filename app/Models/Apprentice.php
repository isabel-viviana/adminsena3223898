<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apprentice extends Model
{
    use HasFactory;
    
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function computer()
    {
        return $this->belongsTo(Computer::class);
    }

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function convocatoria()
    {
        return $this->belongsTo(Convocatoria::class, 'convocatoria_id');
    }

    public function inscripcion()
    {
        return $this->belongsTo(Inscripcion::class, 'inscripcion_id');
    }

    protected $fillable = [
        "persona_id",
        "convocatoria_id",
        "inscripcion_id",
        "codigo_matricula",
        "estado_academico",
        "fecha_matricula",
        "fase_formativa",
        "name_apren",
        "email",
        "cell",
        "course_id",
        "computer_id"
    ];
}
