<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;

class ComputerController extends Controller
{
    public function index(Request $request){

        $query = trim($request->query('q', ''));

        $computers = Computer::query()
            ->when($query !== '', function ($builder) use ($query) {
                $builder->where(function ($builder) use ($query) {
                    $builder->where('numero', 'like', "%{$query}%")
                        ->orWhere('marca', 'like', "%{$query}%");
                });
            })
            ->orderBy('id')
            ->paginate(10)
            ->withQueryString();

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
