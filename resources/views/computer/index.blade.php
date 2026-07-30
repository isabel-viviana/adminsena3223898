@extends('layouts.app')

@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-12">
            <div class="card border-0 shadow-lg bg-white">
                <div class="card-header text-white py-4" style="background: linear-gradient(135deg, #39A900 0%, #39A900 100%);">
                    <h4 class="mb-0">Listado de Computadores</h4>
                </div>
                <div class="card-body p-5">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
                        <div class="me-3">
                            <h5 class="mb-1">Registro de computadores</h5>
                            <p class="text-secondary mb-0">Consulta y administra los equipos disponibles.</p>
                        </div>
                        <a href="{{ route('computer.create') }}" class="btn btn-primary">Registrar nuevo</a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered mt-4" style="border-radius: 8px; overflow: hidden; margin-bottom: 0;">
                            <thead style="background: linear-gradient(135deg, #71E26B 0%, #39A900 100%); color: white;">
                                <tr>
                                    <th>ID</th>
                                    <th>Número</th>
                                    <th>Marca</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($computers as $computer)
                                    <tr>
                                        <td>{{ $computer->id }}</td>
                                        <td>{{ $computer->numero }}</td>
                                        <td>{{ $computer->marca }}</td>
                                        <td>
                                            <a href="{{ route('computer.edit', $computer->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                            <form action="{{ route('computer.destroy', $computer->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este computador?')">Eliminar</button>
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
</div>

@endsection
