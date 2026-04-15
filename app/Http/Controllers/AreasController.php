<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class AreasController extends Controller
{
    public function pruebas()
{
    $area = Area::find(1);

    return [
        'area' => $area,
        'courses' => $area->courses,
        'teachers' => $area->teachers
    ];
}

}
