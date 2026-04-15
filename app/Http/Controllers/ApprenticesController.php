<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apprentice;

class ApprenticesController extends Controller
{
    public function pruebas()
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
}
}
