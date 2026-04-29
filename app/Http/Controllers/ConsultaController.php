<?php

namespace App\Http\Controllers;

use App\Models\Apprentice;
use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Teacher;
use App\Models\TrainingCenter;
use App\Models\Course;

class ConsultaController extends Controller
{
    public function pruebas01()
    {
        //$area = Area::with('teachers', 'courses')->get();
        //return $area;

        //$teacher = Teacher::with('area', 'trainingCenter')->get();
        //return $teacher;

        //$apprentice = Apprentice::with('computer', 'course')->get();
        //return $apprentice;

        $curse = new Course();
        $curse = Course::find(1);

        return $curse->training_center;

    }
}
