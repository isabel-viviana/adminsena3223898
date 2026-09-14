<?php

namespace App\Http\Controllers\People;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\People\Teacher;
use App\Models\Catalog\Area;
use App\Models\Catalog\TrainingCenter;
use App\Models\Academic\Course;

class TeacherController extends Controller
{
    public function index(Request $request){

        $query = trim($request->query('q', ''));

        $teachers = Teacher::query()
            ->when($query !== '', function ($builder) use ($query) {
                $builder->where(function ($builder) use ($query) {
                    $builder->where('name', 'like', "%{$query}%")
                        ->orWhere('email', 'like', "%{$query}%");
                });
            })
            ->orderBy('id')
            ->paginate(10)
            ->withQueryString();

        return view('teacher.index',compact('teachers'));

    }

    public function create()
    {
        $areas = Area::all();
        $trainingCenters = TrainingCenter::all();
        $courses = Course::all();

        return view('teacher.create', compact('areas', 'trainingCenters', 'courses'));
    }

    public function apiIndex()
    {
        return response()->json(Teacher::orderBy('id')->get());
    }

    public function apiShow(Teacher $teacher)
    {
        return response()->json($teacher->load(['area', 'trainingCenter', 'courses', 'person']));
    }

    public function apiStore(Request $request)
    {
        $data = $request->validate([
            'persona_id' => ['nullable', 'exists:personas,id'],
            'name' => ['required', 'string', 'max:255'],
            'codigo_instructor' => ['nullable', 'string', 'max:50'],
            'especialidad' => ['nullable', 'string', 'max:150'],
            'email' => ['required', 'email', 'max:255'],
            'area_id' => ['required', 'exists:areas,id'],
            'training_centers_id' => ['required', 'exists:training_centers,id'],
            'courses' => ['nullable', 'array'],
            'courses.*' => ['integer', 'exists:courses,id'],
        ]);

        $courseIds = $data['courses'] ?? [];
        unset($data['courses']);
        $teacher = Teacher::create($data);
        $teacher->courses()->sync($courseIds);

        return response()->json($teacher->load(['area', 'trainingCenter', 'courses', 'person']), 201);
    }

    public function apiUpdate(Request $request, Teacher $teacher)
    {
        $data = $request->validate([
            'persona_id' => ['nullable', 'exists:personas,id'],
            'name' => ['required', 'string', 'max:255'],
            'codigo_instructor' => ['nullable', 'string', 'max:50'],
            'especialidad' => ['nullable', 'string', 'max:150'],
            'email' => ['required', 'email', 'max:255'],
            'area_id' => ['required', 'exists:areas,id'],
            'training_centers_id' => ['required', 'exists:training_centers,id'],
            'courses' => ['nullable', 'array'],
            'courses.*' => ['integer', 'exists:courses,id'],
        ]);

        $courseIds = $data['courses'] ?? [];
        unset($data['courses']);
        $teacher->update($data);
        $teacher->courses()->sync($courseIds);

        return response()->json($teacher->fresh()->load(['area', 'trainingCenter', 'courses', 'person']));
    }

    public function apiDestroy(Teacher $teacher)
    {
        $teacher->delete();

        return response()->noContent();
    }

    public function store(Request $request)
    {
        $teacherData = $request->except('courses');
        $teacher = Teacher::create($teacherData);
        
        // Asignar cursos a través de la tabla intermedia
        if ($request->has('courses') && !empty($request->courses)) {
            $teacher->courses()->attach($request->courses);
        }

        $file=$request->file("urlFoto");

        if ($file) {
            $nombreArchivo = "foto_".time().".".$file->guessExtension();
            $request->file('urlFoto')->storeAs('public/images', $nombreArchivo );

            $teacher->urlFoto = $nombreArchivo;
            $teacher->save();
        }
        
        return redirect()->route('teacher.index');
    }

    public function edit(Teacher $teacher)
    {
        $areas = Area::all();
        $trainingCenters = TrainingCenter::all();
        $courses = Course::all();

        return view('teacher.edit', compact('teacher', 'areas', 'trainingCenters', 'courses'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $teacherData = $request->except('courses');
        $teacher->update($teacherData);

        if ($request->has('courses') && !empty($request->courses)) {
            $teacher->courses()->sync($request->courses);
        } else {
            $teacher->courses()->detach();
        }

        return redirect()->route('teacher.index');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return redirect()->route('teacher.index');
    }
}
