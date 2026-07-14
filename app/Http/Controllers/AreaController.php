<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{

    public function create (){

        return view('area.create');


    }

    public function index(){

        $areas = Area::all();
        return view('area.index',compact('areas'));

    }

    public function store(Request $request){
        $area = Area::create(['name' => $request->name]);
        return redirect()->route('area.index');
    }

}
