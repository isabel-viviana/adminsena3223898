<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;

class ComputersController extends Controller
{
    public function pruebas()
{
    $computer = Computer::find(1);

    return [
        'computer' => $computer,
        'apprentices' => $computer->apprentices
    ];
}
}
