@extends('layouts.app')

@section('content')

<form class="module-form" data-form-title="Editar curso" action="{{ route('course.update', $course->id) }}" method="POST" enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name_curso" class="form-label">Número de Curso</label>
        <input
            type="text"
            name="name_curso"
            id="name_curso"
            class="form-control"
            value="{{ $course->name_curso }}">
    </div>

    <div class="mb-3">
        <label for="day" class="form-label">Día</label>
        <input
            type="text"
            name="day"
            id="day"
            class="form-control"
            value="{{ $course->day }}">
    </div>

    <div class="mb-3">
        <label for="area_id" class="form-label">Área</label>
        <select name="area_id" id="area_id" class="form-select">
            <option value="">Seleccione un área</option>
            @foreach($areas as $area)
                <option value="{{ $area->id }}" {{ $course->area_id == $area->id ? 'selected' : '' }}>{{ $area->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="training_centers_id" class="form-label">Centro de Formación</label>
        <select name="training_centers_id" id="training_centers_id" class="form-select">
            <option value="">Seleccione un centro de formación</option>
            @foreach($trainingCenters as $trainingCenter)
                <option value="{{ $trainingCenter->id }}" {{ $course->training_centers_id == $trainingCenter->id ? 'selected' : '' }}>{{ $trainingCenter->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="teachers" class="form-label">Profesores (Selecciona uno o varios)</label>
        <select name="teachers[]" id="teachers" class="form-select" multiple>
            <option value="">Seleccione profesores</option>
            @foreach($teachers as $teacher)
                <option value="{{ $teacher->id }}" {{ in_array($teacher->id, $course->teachers->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $teacher->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">
        Actualizar
    </button>

</form>

@endsection
