<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function training_center()
    {
        return $this->belongsTo(TrainingCenter::class, 'training_centers_id');
    }

    public function apprentices()
    {
        return $this->hasMany(Apprentice::class);
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'course_teachers');
    }

    public function nivelFormacion()
    {
        return $this->belongsTo(NivelFormacion::class, 'nivel_id');
    }

    public function convocatorias()
    {
        return $this->hasMany(Convocatoria::class, 'course_id');
    }

    public function getLevelAttribute($value)
    {
        return $value ?? $this->nivelFormacion?->nombre;
    }

    public function setLevelAttribute($value)
    {
        $this->attributes['level'] = $value;
        $nivel = NivelFormacion::where('nombre', $value)->first();
        if ($nivel) {
            $this->attributes['nivel_id'] = $nivel->id;
        }
    }

    protected $fillable = [
        "name_curso",
        "codigo_programa",
        "nivel_id",
        "version_programa",
        "duracion_horas_totales",
        "perfil_ingreso",
        "day",
        "description",
        "level",
        "duration",
        "area_id",
        "training_centers_id"
    ];

    protected $guarded = [
        'urlFoto'
    ];
}
