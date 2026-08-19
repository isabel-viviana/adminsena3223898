@extends('layouts.app')

@section('content')

<form class="module-form" data-form-title="Registrar curso" action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data">

    @csrf

    <div class="mb-3">
        <label for="name_curso" class="form-label">Número de Curso</label>
        <input type="text" name="name_curso" id="name_curso" class="form-control">
    </div>

    <div class="mb-3">
        <label for="day" class="form-label">Día</label>
        <input type="text" name="day" id="day" class="form-control">
    </div>

    <div class="mb-3">
        <label for="area_id" class="form-label">Área</label>
        <select name="area_id" id="area_id" class="form-select">
            <option value="">Seleccione un área</option>
            @foreach($areas as $area)
                <option value="{{ $area->id }}">{{ $area->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="training_centers_id" class="form-label">Centro de Formación</label>
        <select name="training_centers_id" id="training_centers_id" class="form-select">
            <option value="">Seleccione un centro de formación</option>
            @foreach($trainingCenters as $trainingCenter)
                <option value="{{ $trainingCenter->id }}">{{ $trainingCenter->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Enviar Formulario</button>
</form>

@endsection