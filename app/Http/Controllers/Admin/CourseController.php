<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Academic\Course;
use App\Models\Catalog\Area;
use App\Models\Catalog\TrainingCenter;
use App\Models\People\Teacher;

class CourseController extends Controller
{
    public function index(Request $request){

        $query = trim($request->query('q', ''));

        $courses = Course::query()
            ->with(['area', 'training_center'])
            ->when($query !== '', function ($builder) use ($query) {
                $builder->where(function ($builder) use ($query) {
                    $builder->where('name_curso', 'like', "%{$query}%")
                        ->orWhere('day', 'like', "%{$query}%")
                        ->orWhere('description', 'like', "%{$query}%")
                        ->orWhere('level', 'like', "%{$query}%");
                });
            })
            ->orderBy('id')
            ->paginate(10)
            ->withQueryString();

        return view('course.index',compact('courses'));

    }

    public function create (){
        $areas = Area::all();
        $trainingCenters = TrainingCenter::all();
        $teachers = Teacher::all();

        return view('course.create', compact('areas', 'trainingCenters', 'teachers'));
    }

    public function apiIndex()
    {
        return response()->json(Course::orderBy('id')->get());
    }

    public function apiShow(Course $course)
    {
        return response()->json($course->load(['area', 'training_center', 'teachers']));
    }

    public function apiStore(Request $request)
    {
        $data = $request->validate([
            'name_curso' => ['required', 'string', 'max:255'],
            'codigo_curso' => ['nullable', 'string', 'max:50'],
            'description' => ['nullable', 'string'],
            'duracion_horas' => ['nullable', 'integer', 'min:0'],
            'level' => ['nullable', 'in:Tecnico,Tecnologo,Complementario'],
            'area_id' => ['required', 'exists:areas,id'],
            'training_centers_id' => ['nullable', 'exists:training_centers,id'],
            'teachers' => ['nullable', 'array'],
            'teachers.*' => ['integer', 'exists:teachers,id'],
        ]);

        $teacherIds = $data['teachers'] ?? [];
        unset($data['teachers']);
        $course = Course::create($data);
        $course->teachers()->sync($teacherIds);

        return response()->json($course->load(['area', 'training_center', 'teachers']), 201);
    }

    public function apiUpdate(Request $request, Course $course)
    {
        $data = $request->validate([
            'name_curso' => ['required', 'string', 'max:255'],
            'codigo_curso' => ['nullable', 'string', 'max:50'],
            'description' => ['nullable', 'string'],
            'duracion_horas' => ['nullable', 'integer', 'min:0'],
            'level' => ['nullable', 'in:Tecnico,Tecnologo,Complementario'],
            'area_id' => ['required', 'exists:areas,id'],
            'training_centers_id' => ['nullable', 'exists:training_centers,id'],
            'teachers' => ['nullable', 'array'],
            'teachers.*' => ['integer', 'exists:teachers,id'],
        ]);

        $teacherIds = $data['teachers'] ?? [];
        unset($data['teachers']);
        $course->update($data);
        $course->teachers()->sync($teacherIds);

        return response()->json($course->fresh()->load(['area', 'training_center', 'teachers']));
    }

    public function apiDestroy(Course $course)
    {
        $course->delete();

        return response()->noContent();
    }

    public function store(Request $request)
    {
        $courseData = $request->validate([
            'name_curso' => ['required', 'string', 'max:255'],
            'day' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'level' => ['required', 'in:Tecnico,Tecnologo,Complementario'],
            'duration' => ['required', 'integer', 'min:1', 'max:65535'],
            'area_id' => ['required', 'exists:areas,id'],
            'training_centers_id' => ['required', 'exists:training_centers,id'],
            'teachers' => ['nullable', 'array'],
            'teachers.*' => ['integer', 'exists:teachers,id'],
        ]);
        unset($courseData['teachers']);
        $course = Course::create($courseData);
        
        // Asignar profesores a través de la tabla intermedia
        if ($request->has('teachers') && !empty($request->teachers)) {
            $course->teachers()->attach($request->teachers);
        }

        $file=$request->file("urlFoto");

        if ($file) {
            $nombreArchivo = "foto_".time().".".$file->guessExtension();
            $request->file('urlFoto')->storeAs('public/images', $nombreArchivo );

            $course->urlFoto = $nombreArchivo;
            $course->save();
        }
        
        return redirect()->route('course.index');
    }

    public function edit(Course $course)
    {
        $areas = Area::all();
        $trainingCenters = TrainingCenter::all();
        $teachers = Teacher::all();

        return view('course.edit', compact('course', 'areas', 'trainingCenters', 'teachers'));
    }

    public function update(Request $request, Course $course)
    {
        $courseData = $request->validate([
            'name_curso' => ['required', 'string', 'max:255'],
            'day' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'level' => ['required', 'in:Tecnico,Tecnologo,Complementario'],
            'duration' => ['required', 'integer', 'min:1', 'max:65535'],
            'area_id' => ['required', 'exists:areas,id'],
            'training_centers_id' => ['required', 'exists:training_centers,id'],
            'teachers' => ['nullable', 'array'],
            'teachers.*' => ['integer', 'exists:teachers,id'],
        ]);
        unset($courseData['teachers']);
        $course->update($courseData);

        if ($request->has('teachers') && !empty($request->teachers)) {
            $course->teachers()->sync($request->teachers);
        } else {
            $course->teachers()->detach();
        }

        return redirect()->route('course.index');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('course.index');
    }
}
