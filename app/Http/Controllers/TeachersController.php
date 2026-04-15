<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeachersController extends Controller
{
    //
    public function pruebas(){

        $teacher = Teacher::find(1);
    return [
        'teacher' => $teacher,
        'area' => $teacher->area,
        'training_center' => $teacher->trainingCenter,
        'course' => $teacher->course
    ];

    }

}
