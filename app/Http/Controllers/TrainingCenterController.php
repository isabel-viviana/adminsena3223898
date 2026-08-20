<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainingCenter;

class TrainingCenterController extends Controller
{
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

    public function edit(TrainingCenter $trainingCenter)
    {
        return view('trainingCenter.edit', compact('trainingCenter'));
    }

    public function update(Request $request, TrainingCenter $trainingCenter)
    {
        $trainingCenter->update([
            'name' => $request->name,
            'location' => $request->location
        ]);

        return redirect()->route('trainingCenter.index');
    }

    public function destroy(TrainingCenter $trainingCenter)
    {
        $trainingCenter->delete();

        return redirect()->route('trainingCenter.index');
    }
}
