<?php

use Illuminate\Support\Facades\Route;

/*use App\Http\Controllers\TeachersController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\AreasController;
use App\Http\Controllers\TrainingCentersController;
use App\Http\Controllers\ApprenticesController;
use App\Http\Controllers\ComputersController;

use App\Http\Controllers\ConsultaController;

Route::get('/teacher/pruebas', [TeachersController::class, 'pruebas']);
Route::get('/course/pruebas', [CoursesController::class, 'pruebas']);
Route::get('/area/pruebas', [AreasController::class, 'pruebas']);
Route::get('/center/pruebas', [TrainingCentersController::class, 'pruebas']);
Route::get('/apprentice/pruebas', [ApprenticesController::class, 'pruebas']);
Route::get('/computer/pruebas', [ComputersController::class, 'pruebas']);

Route::get('/consulta/pruebas01', [ConsultaController::class, 'pruebas01']);
*/

use App\Http\Controllers\AreaController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\TrainingCenterController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ApprenticeController;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/area',[AreaController::class,'index'])->name('area.index');
Route::get('area/create',[AreaController::class,'create'])->name('area.create');
Route::post('area/store',[AreaController::class,'store'])->name('area.store');

Route::get('/computer',[ComputerController::class,'index'])->name('computer.index');
Route::get('computer/create',[ComputerController::class,'create'])->name('computer.create');
Route::post('computer/store',[ComputerController::class,'store'])->name('computer.store');

Route::get('/trainingCenter',[TrainingCenterController::class,'index'])->name('trainingCenter.index');
Route::get('trainingCenter/create',[TrainingCenterController::class,'create'])->name('trainingCenter.create');
Route::post('trainingCenter/store',[TrainingCenterController::class,'store'])->name('trainingCenter.store');

Route::get('/teacher',[TeacherController::class,'index'])->name('teacher.index');
Route::get('teacher/create',[TeacherController::class,'create'])->name('teacher.create');
Route::post('teacher/store',[TeacherController::class,'store'])->name('teacher.store');

Route::get('/course',[CourseController::class,'index'])->name('course.index');
Route::get('course/create',[CourseController::class,'create'])->name('course.create');
Route::post('course/store',[CourseController::class,'store'])->name('course.store');

Route::get('/apprentice',[ApprenticeController::class,'index'])->name('apprentice.index');
Route::get('apprentice/create',[ApprenticeController::class,'create'])->name('apprentice.create');
Route::post('apprentice/store',[ApprenticeController::class,'store'])->name('apprentice.store');


