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
        return $this->belongsTo(TrainingCenter::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_teachers');
    }

    protected $fillable = [
        "name",
        "email",
        "area_id",
        "training_centers_id"
    ];
}
