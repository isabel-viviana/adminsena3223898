<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainingCenter;

class TrainingCenterController extends Controller
{
    /*public function pruebas(){
    $center = TrainingCenter::find(1);

    return [
    'training_center' => $center,
    'course' => $center->course,
    'teacher' => $center->teacher];
    }*/

    public function index(){

        $trainingCenters = TrainingCenter::all();
        return view('trainingCenter.index',compact('trainingCenters'));

    }

    public function create (){

        return view('trainingCenter.create');


    }

    public function store(Request $request){
        $trainingCenter = TrainingCenter::create([
            'name' => $request->name,
            'location' => $request->location
        ]);
        return redirect()->route('trainingCenter.index');
    }
}
