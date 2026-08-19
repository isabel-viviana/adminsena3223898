@extends('layouts.app')

@section('content')

<form class="module-form" data-form-title="Registrar computador" action="{{route('computer.store')}}" method="POST" enctype="multipart/form-data">

    @csrf

    <div class="mb-3">
        <label for="numero" class="form-label">Número de Computadora</label>
        <input type="text" name="numero" id="numero" class="form-control">
    </div>

    <div class="mb-3">
        <label for="marca" class="form-label">Marca</label>
        <input type="text" name="marca" id="marca" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Enviar Formulario</button>
</form>

@endsection