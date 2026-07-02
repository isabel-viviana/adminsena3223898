<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;

class ComputerController extends Controller
{
    /*public function pruebas(){
    $computer = Computer::find(1);

    return [
        'computer' => $computer,
        'apprentices' => $computer->apprentices];
    }*/

    public function create (){

        return view('computer.create');


    }

    public function store(Request $request){
        $computer = Computer::create([
            'numero' => $request->numero,
            'marca' => $request->marca
        ]);
        return redirect()->view('computer.createSuccess', compact('computer'));
    }
}
