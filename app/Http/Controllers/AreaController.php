<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{
    /* public function pruebas(){
    $area = Area::find(1);

    return [
        'area' => $area,
        'courses' => $area->courses,
        'teachers' => $area->teachers];
    }
    */

    public function create (){

        return view('area.create');


    }

    public function store(Request $request){
        $area = Area::create(['name' => $request->name]);
        return redirect()->view('area.createSuccess',compact('area'));
    }

}
