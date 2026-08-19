<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AreaController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\TrainingCenterController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ApprenticeController;

Route::get('/', function () {return view('dashboard');});

Route::get('/login', function () {return view('auth.login');})->name('login');

Route::get('/area',[AreaController::class,'index'])->name('area.index');
Route::get('area/create',[AreaController::class,'create'])->name('area.create');
Route::post('area/store',[AreaController::class,'store'])->name('area.store');
Route::get('area/edit/{area}',[AreaController::class,'edit'])->name('area.edit');
Route::put('area/update/{area}',[AreaController::class,'update'])->name('area.update');
Route::delete('area/delete/{area}',[AreaController::class,'destroy'])->name('area.destroy');

Route::get('/computer',[ComputerController::class,'index'])->name('computer.index');
Route::get('computer/create',[ComputerController::class,'create'])->name('computer.create');
Route::post('computer/store',[ComputerController::class,'store'])->name('computer.store');
Route::get('computer/edit/{computer}',[ComputerController::class,'edit'])->name('computer.edit');
Route::put('computer/update/{computer}',[ComputerController::class,'update'])->name('computer.update');
Route::delete('computer/delete/{computer}',[ComputerController::class,'destroy'])->name('computer.destroy');

Route::get('/trainingCenter',[TrainingCenterController::class,'index'])->name('trainingCenter.index');
Route::get('trainingCenter/create',[TrainingCenterController::class,'create'])->name('trainingCenter.create');
Route::post('trainingCenter/store',[TrainingCenterController::class,'store'])->name('trainingCenter.store');
Route::get('trainingCenter/edit/{trainingCenter}',[TrainingCenterController::class,'edit'])->name('trainingCenter.edit');
Route::put('trainingCenter/update/{trainingCenter}',[TrainingCenterController::class,'update'])->name('trainingCenter.update');
Route::delete('trainingCenter/delete/{trainingCenter}',[TrainingCenterController::class,'destroy'])->name('trainingCenter.destroy');

Route::get('/teacher',[TeacherController::class,'index'])->name('teacher.index');
Route::get('teacher/create',[TeacherController::class,'create'])->name('teacher.create');
Route::post('teacher/store',[TeacherController::class,'store'])->name('teacher.store');
Route::get('teacher/edit/{teacher}',[TeacherController::class,'edit'])->name('teacher.edit');
Route::put('teacher/update/{teacher}',[TeacherController::class,'update'])->name('teacher.update');
Route::delete('teacher/delete/{teacher}',[TeacherController::class,'destroy'])->name('teacher.destroy');

Route::get('/course',[CourseController::class,'index'])->name('course.index');
Route::get('course/create',[CourseController::class,'create'])->name('course.create');
Route::post('course/store',[CourseController::class,'store'])->name('course.store');
Route::get('course/edit/{course}',[CourseController::class,'edit'])->name('course.edit');
Route::put('course/update/{course}',[CourseController::class,'update'])->name('course.update');
Route::delete('course/delete/{course}',[CourseController::class,'destroy'])->name('course.destroy');

Route::get('/apprentice',[ApprenticeController::class,'index'])->name('apprentice.index');
Route::get('apprentice/create',[ApprenticeController::class,'create'])->name('apprentice.create');
Route::post('apprentice/store',[ApprenticeController::class,'store'])->name('apprentice.store');
Route::get('apprentice/edit/{apprentice}',[ApprenticeController::class,'edit'])->name('apprentice.edit');
Route::put('apprentice/update/{apprentice}',[ApprenticeController::class,'update'])->name('apprentice.update');
Route::delete('apprentice/delete/{apprentice}',[ApprenticeController::class,'destroy'])->name('apprentice.destroy');


