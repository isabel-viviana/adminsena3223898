<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convocatoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_ficha',
        'codigo_convocatoria',
        'course_id',
        'training_center_id',
        'jornada_id',
        'modalidad_id',
        'teacher_id',
        'schedule',
        'modality',
        'quota',
        'start_date',
        'end_date',
        'status',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function trainingCenter()
    {
        return $this->belongsTo(TrainingCenter::class);
    }

    public function jornada()
    {
        return $this->belongsTo(Jornada::class, 'jornada_id');
    }

    public function modalidad()
    {
        return $this->belongsTo(Modalidad::class, 'modalidad_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function getScheduleAttribute($value)
    {
        return $value ?? $this->jornada?->nombre;
    }

    public function setScheduleAttribute($value)
    {
        $jornada = Jornada::where('nombre', $value)->first();
        if ($jornada) {
            $this->attributes['jornada_id'] = $jornada->id;
        }
    }

    public function getModalityAttribute($value)
    {
        return $value ?? $this->modalidad?->nombre;
    }

    public function setModalityAttribute($value)
    {
        $modalidad = Modalidad::where('nombre', $value)->first();
        if ($modalidad) {
            $this->attributes['modalidad_id'] = $modalidad->id;
        }
    }

    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class, 'convocatoria_id');
    }

    public function aprendices()
    {
        return $this->hasMany(Apprentice::class, 'convocatoria_id');
    }
}
