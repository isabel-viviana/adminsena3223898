<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;

class ComputerController extends Controller
{
    public function index(){

        $computers = Computer::all();
        return view('computer.index',compact('computers'));

    }

    public function create (){

        return view('computer.create');


    }

    public function store(Request $request){
        $computer = Computer::create([
            'numero' => $request->numero,
            'marca' => $request->marca
        ]);
        return redirect()->route('computer.index');
    }

    public function edit(Computer $computer)
    {
        return view('computer.edit', compact('computer'));
    }

    public function update(Request $request, Computer $computer)
    {
        $computer->update([
            'numero' => $request->numero,
            'marca' => $request->marca
        ]);

        return redirect()->route('computer.index');
    }

    public function destroy(Computer $computer)
    {
        $computer->delete();

        return redirect()->route('computer.index');
    }
}
