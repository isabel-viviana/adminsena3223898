<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TeachersController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\AreasController;
use App\Http\Controllers\TrainingCentersController;
use App\Http\Controllers\ApprenticesController;
use App\Http\Controllers\ComputersController;

Route::get('/teacher/pruebas', [TeachersController::class, 'pruebas']);
Route::get('/course/pruebas', [CoursesController::class, 'pruebas']);
Route::get('/area/pruebas', [AreasController::class, 'pruebas']);
Route::get('/center/pruebas', [TrainingCentersController::class, 'pruebas']);
Route::get('/apprentice/pruebas', [ApprenticesController::class, 'pruebas']);
Route::get('/computer/pruebas', [ComputersController::class, 'pruebas']);
