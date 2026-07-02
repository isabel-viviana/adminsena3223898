@extends('layouts.app')

@section('content')

<div>
    <h1>datos registrados exitosamente</h1>

    <p>ID: {{ $apprentice->id }}</p>
    <p>Nombre: {{ $apprentice->name_apren }}</p>
    <p>Email: {{ $apprentice->email }}</p>
    <p>Celular: {{ $apprentice->cell }}</p>
    <p>Curso: {{ $apprentice->course_id }}</p>
    <p>Computador: {{ $apprentice->computer_id }}</p>
</div>

@endsection