<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\AreaController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\TrainingCenterController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ApprenticeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\ConvocatoriaController;
use App\Http\Controllers\InscripcionController;

Route::get('/', function (Request $request) {
	$query = trim((string) $request->query('q', ''));

	if ($query === '') {
		return view('dashboard');
	}

	$normalizedQuery = mb_strtolower($query, 'UTF-8');
	$destinations = [
		['label' => 'Inicio', 'url' => route('home'), 'keywords' => ['inicio', 'home', 'portal']],
		['label' => '¿Quiénes somos?', 'url' => route('home').'#conocenos', 'keywords' => ['quienes', 'quiénes', 'somos', 'empresa', 'mision', 'misión']],
		['label' => 'Contáctanos', 'url' => route('home').'#contacto', 'keywords' => ['contacto', 'contáctanos', 'telefono', 'teléfono', 'celular']],
		['label' => 'Áreas', 'url' => route('area.index'), 'keywords' => ['area', 'área', 'areas', 'áreas', 'administracion', 'administración', 'admin']],
		['label' => 'Centros de formación', 'url' => route('trainingCenter.index'), 'keywords' => ['centro', 'centros', 'formacion', 'formación', 'administracion', 'administración', 'admin']],
		['label' => 'Computadores', 'url' => route('computer.index'), 'keywords' => ['computador', 'computadores', 'equipo', 'equipos', 'administracion', 'administración', 'admin']],
		['label' => 'Docentes', 'url' => route('teacher.index'), 'keywords' => ['docente', 'docentes', 'profesor', 'profesores', 'administracion', 'administración', 'admin']],
		['label' => 'Cursos', 'url' => route('course.index'), 'keywords' => ['curso', 'cursos', 'formacion', 'formación', 'administracion', 'administración', 'admin']],
		['label' => 'Aprendices', 'url' => route('apprentice.index'), 'keywords' => ['aprendiz', 'aprendices', 'estudiante', 'estudiantes', 'administracion', 'administración', 'admin']],
	];

	$matches = array_values(array_filter($destinations, function (array $destination) use ($normalizedQuery) {
		return array_reduce($destination['keywords'], function (bool $found, string $keyword) use ($normalizedQuery) {
			$normalizedKeyword = mb_strtolower($keyword, 'UTF-8');

			return $found || str_contains($normalizedKeyword, $normalizedQuery) || str_contains($normalizedQuery, $normalizedKeyword);
		}, false);
	}));

	if (count($matches) === 1) {
		return redirect($matches[0]['url']);
	}

	return view('dashboard', [
		'searchQuery' => $query,
		'searchResults' => $matches,
		'searchMessage' => $matches === [] ? 'No se encontraron resultados' : null,
	]);
})->name('home');

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

Route::get('/login', function () {
	return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin');
Route::get('/portal', [PortalController::class, 'index'])->name('portal');

Route::get('/convocatorias', [ConvocatoriaController::class, 'index'])->name('convocatoria.index');
Route::get('/convocatorias/create', [ConvocatoriaController::class, 'create'])->name('convocatoria.create');
Route::post('/convocatorias', [ConvocatoriaController::class, 'store'])->name('convocatoria.store');
Route::get('/convocatorias/{convocatoria}/edit', [ConvocatoriaController::class, 'edit'])->name('convocatoria.edit');
Route::put('/convocatorias/{convocatoria}', [ConvocatoriaController::class, 'update'])->name('convocatoria.update');
Route::get('/portal/convocatorias/{convocatoria}', [ConvocatoriaController::class, 'detail'])->name('portal.convocatoria.detail');
Route::get('/admin/convocatorias/{convocatoria}', [ConvocatoriaController::class, 'adminStats'])->name('admin.convocatoria.stats');

Route::get('/portal/convocatorias', [ConvocatoriaController::class, 'catalog'])->name('portal.convocatorias');
Route::get('/portal/mis-inscripciones', [InscripcionController::class, 'misInscripciones'])->name('portal.mis-inscripciones');
Route::get('/mis-inscripciones/{inscripcion}/comprobante', [InscripcionController::class, 'comprobante'])->name('inscripcion.comprobante');
Route::post('/convocatorias/{convocatoria}/inscribirme', [InscripcionController::class, 'store'])->name('inscripcion.store');
Route::patch('/mis-inscripciones/{inscripcion}/cancelar', [InscripcionController::class, 'cancel'])->name('inscripcion.cancel');
Route::get('/convocatorias/{convocatoria}/inscritos', [InscripcionController::class, 'inscritos'])->name('convocatoria.inscritos');
Route::patch('/admin/inscripciones/{inscripcion}/estado', [InscripcionController::class, 'updateStatus'])->name('inscripcion.update-status');


