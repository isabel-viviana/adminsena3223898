@extends('layouts.app')

@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-12">
            <div class="card border-0 shadow-lg bg-white">

                <div class="card-header text-white py-4" style="background: linear-gradient(135deg, #39A900 0%, #39A900 100%);">
                    <h4 class="mb-0">Sistema de Gestión del Centro de Formación</h4>
                </div>

                <div class="card-body p-5">
                    <p class="mb-4">Bienvenido al sistema, aquí podrá administrar los módulos del centro de formación.</p>

                    <div class="row g-4">
                        <div class="col-md-6 col-lg-4 card border-0 shadow-sm h-100 card-body">
                            <h5 class="card-title">Áreas</h5>
                            <a href="{{ route('area.index') }}" class="btn btn-primary mt-3">Administrar</a>
                        </div>

                        <div class="col-md-6 col-lg-4 card border-0 shadow-sm h-100 card-body">
                            <h5 class="card-title">Centros de Formación</h5>
                            <a href="{{ route('trainingCenter.index') }}" class="btn btn-primary mt-3">Administrar</a>
                        </div>

                        <div class="col-md-6 col-lg-4 card border-0 shadow-sm h-100 card-body">
                            <h5 class="card-title">Computadores</h5>
                            <a href="{{ route('computer.index') }}" class="btn btn-primary mt-3">Administrar</a>
                        </div>

                        <div class="col-md-6 col-lg-4 card border-0 shadow-sm h-100 card-body">
                            <h5 class="card-title">Docentes</h5>
                            <a href="{{ route('teacher.index') }}" class="btn btn-primary mt-3">Administrar</a>
                        </div>

                        <div class="col-md-6 col-lg-4 card border-0 shadow-sm h-100 card-body">
                            <h5 class="card-title">Cursos</h5>
                            <a href="{{ route('course.index') }}" class="btn btn-primary mt-3">Administrar</a>
                        </div>

                        <div class="col-md-6 col-lg-4 card border-0 shadow-sm h-100 card-body">
                            <h5 class="card-title">Aprendices</h5>
                            <a href="{{ route('apprentice.index') }}" class="btn btn-primary mt-3">Administrar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
