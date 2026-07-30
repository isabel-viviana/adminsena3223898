@extends('layouts.app')

@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card border-0 shadow-lg bg-white">
                <div class="card-header text-white py-4" style="background: linear-gradient(135deg, #39A900 0%, #39A900 100%);">
                    <h4 class="mb-0">Listado de Cursos</h4>
                </div>
                <div class="card-body p-5">
                    <a href="{{ route('course.create') }}" class="btn btn-primary mb-4">Registrar nuevo</a>
                    <table class="table table-bordered mt-4" style="border-radius: 8px; overflow: hidden; margin-bottom: 0;">
                        <thead style="background: linear-gradient(135deg, #71E26B 0%, #39A900 100%); color: white;">
                            <tr>
                                <th>ID</th>
                                <th>Nombre del Curso</th>
                                <th>Día</th>                                <th>Acciones</th>                            </tr>
                        </thead>

                        <tbody>
                            @foreach($courses as $course)
                                <tr>
                                    <td>{{ $course->id }}</td>
                                    <td>{{ $course->name_curso }}</td>
                                    <td>{{ $course->day }}</td>
                                    <td>
                                        <a href="{{ route('course.edit', $course->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                        <form action="{{ route('course.destroy', $course->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este curso?')">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
