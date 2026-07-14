<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apprentice;
use App\Models\Course;
use App\Models\Computer;

class ApprenticeController extends Controller
{
    public function index(){

        $apprentices = Apprentice::all();
        return view('apprentice.index',compact('apprentices'));

    }

    /*public function pruebas()
{
    $apprentice = Apprentice::find(5);
    if (!$apprentice){
        return "no existe ningun aprendiz";
    }

    return [
        'apprentice' => $apprentice,
        'course' => $apprentice->course,
        'computer' => $apprentice->computer
    ];
}*/
    
    public function create (){
        $courses = Course::all();
        $computers = Computer::all();

        return view('apprentice.create', compact('courses', 'computers'));
    }

    public function store(Request $request)
    {
        $apprentice = Apprentice::create($request->all());
        return redirect()->route('apprentice.index');
    }
}
