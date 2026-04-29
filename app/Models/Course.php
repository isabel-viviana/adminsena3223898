<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\models\TrainingCenter;

class Course extends Model
{
    use HasFactory;
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function training_center()
    {
        return $this->belongsTo(TrainingCenter::class);
    }

    public function apprentices()
    {
        return $this->hasMany(Apprentice::class);
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }
}
