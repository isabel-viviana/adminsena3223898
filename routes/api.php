<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\TrainingCenterController;
use App\Http\Controllers\People\TeacherController;
use App\Http\Controllers\Resource\ComputerController;
use App\Http\Controllers\Apprentice\PortalController;

Route::get('/saludo', function () {
    return response()->json([
        'mensaje' => 'API funcionando correctamente'
    ]);
});

Route::get('/areas', [AreaController::class, 'apiIndex']);


Route::get('/courses', [CourseController::class, 'apiIndex']);


Route::get('/training-centers', [TrainingCenterController::class, 'apiIndex']);


Route::get('/teachers', [TeacherController::class, 'apiIndex']);


Route::get('/computers', [ComputerController::class, 'apiIndex']);


Route::get('/apprentices', [PortalController::class, 'apiIndex']);
