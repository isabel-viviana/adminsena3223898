<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Area;
use App\Models\TrainingCenter;
use App\Models\Course;

class TeacherController extends Controller
{
    public function index(){

        $teachers = Teacher::all();
        return view('teacher.index',compact('teachers'));

    }

    public function create()
    {
        $areas = Area::all();
        $trainingCenters = TrainingCenter::all();
        $courses = Course::all();

        return view('teacher.create', compact('areas', 'trainingCenters', 'courses'));
    }

    public function store(Request $request)
    {
        $teacherData = $request->except('courses');
        $teacher = Teacher::create($teacherData);
        
        // Asignar cursos a través de la tabla intermedia
        if ($request->has('courses') && !empty($request->courses)) {
            $teacher->courses()->attach($request->courses);
        }
        
        return redirect()->route('teacher.index');
    }

    public function edit(Teacher $teacher)
    {
        $areas = Area::all();
        $trainingCenters = TrainingCenter::all();
        $courses = Course::all();

        return view('teacher.edit', compact('teacher', 'areas', 'trainingCenters', 'courses'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $teacherData = $request->except('courses');
        $teacher->update($teacherData);

        if ($request->has('courses') && !empty($request->courses)) {
            $teacher->courses()->sync($request->courses);
        } else {
            $teacher->courses()->detach();
        }

        return redirect()->route('teacher.index');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return redirect()->route('teacher.index');
    }
}
