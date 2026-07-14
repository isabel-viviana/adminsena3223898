<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Area;
use App\Models\TrainingCenter;
use App\Models\Teacher;

class CourseController extends Controller
{
    public function index(){

        $courses = Course::all();
        return view('course.index',compact('courses'));

    }

    public function create (){
        $areas = Area::all();
        $trainingCenters = TrainingCenter::all();
        $teachers = Teacher::all();

        return view('course.create', compact('areas', 'trainingCenters', 'teachers'));
    }

    public function store(Request $request)
    {
        $courseData = $request->except('teachers');
        $course = Course::create($courseData);
        
        // Asignar profesores a través de la tabla intermedia
        if ($request->has('teachers') && !empty($request->teachers)) {
            $course->teachers()->attach($request->teachers);
        }
        
        return redirect()->route('course.index');
    }
}
