@extends('layouts.app')

@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card border-0 shadow-lg bg-white">
                <div class="card-header text-white py-4" style="background: linear-gradient(135deg, #7e92c9 0%, #7e92c9 100%);">
                    <h4 class="mb-0">Listado de Centros de Formación</h4>
                </div>
                <div class="card-body p-5">
                    <a href="{{ route('trainingCenter.create') }}" class="btn btn-primary mb-4">Registrar nuevo</a>
                    <table class="table table-bordered mt-4" style="border-radius: 8px; overflow: hidden; margin-bottom: 0;">
                        <thead style="background: linear-gradient(135deg, #a1b7f3 0%, #7e92c9 100%); color: white;">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Localización</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($trainingCenters as $trainingCenter)
                                <tr>
                                    <td>{{ $trainingCenter->id }}</td>
                                    <td>{{ $trainingCenter->name }}</td>
                                    <td>{{ $trainingCenter->location }}</td>
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
