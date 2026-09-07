<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function trainingCenter()
    {
        return $this->belongsTo(TrainingCenter::class, 'training_centers_id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_teachers');
    }

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function convocatorias()
    {
        return $this->hasMany(Convocatoria::class, 'teacher_id');
    }

    protected $fillable = [
        "persona_id",
        "name",
        "codigo_instructor",
        "especialidad",
        "email",
        "area_id",
        "training_centers_id"
    ];

    protected $guarded = [
        'urlFoto'
    ];
}
