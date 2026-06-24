<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apprentice;

class ApprenticeController extends Controller
{
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

        return view('apprentice.create');


    }

    public function store(Request $request){

        $apprentice = new Aprentice();

        $apprentice->name=$request->name;
        $apprentice->save();

        return $area;

    }
}
