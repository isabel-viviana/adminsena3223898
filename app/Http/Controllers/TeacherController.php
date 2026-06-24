<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Area;
use App\Models\TrainingCenter;

class TeacherController extends Controller
{
    /*
    public function pruebas(){

        $teacher = Teacher::find(1);
    return [
        'teacher' => $teacher,
        'area' => $teacher->area,
        'training_center' => $teacher->trainingCenter,
        'course' => $teacher->course
    ];

    }*/

    public function create()
    {
        $areas = Area::all();
        $trainingCenters = TrainingCenter::all();

        return view('teacher.create', compact('areas', 'trainingCenters'));
    }

    public function store(Request $request)
    {

        $teacher = Teacher::create($request->all());
        return $teacher;
    }

}
