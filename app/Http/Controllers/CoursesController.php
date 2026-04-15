<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CoursesController extends Controller
{
    public function pruebas()
{
    $course = Course::find(1);

    return [
        'course' => $course,
        'area' => $course->area,
        'training_center' => $course->trainingCenter,
        'teacher' => $course->teacher,
        'apprentice' => $course->apprentice
    ];
}
}
