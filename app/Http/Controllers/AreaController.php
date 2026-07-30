<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{

    public function create()
    {
        return view('area.create');
    }

    public function index()
    {
        $areas = Area::all();
        return view('area.index', compact('areas'));
    }

    public function store(Request $request)
    {
        Area::create([
            'name' => $request->name
        ]);

        return redirect()->route('area.index');
    }

    public function edit(Area $area)
    {
        return view('area.edit', compact('area'));
    }

    public function update(Request $request, Area $area)
    {
        $area->update([
            'name' => $request->name
        ]);

        return redirect()->route('area.index');
    }

    public function destroy(Area $area)
    {
        $area->delete();

        return redirect()->route('area.index');
    }

}