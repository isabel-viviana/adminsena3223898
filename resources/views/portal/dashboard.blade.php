@extends('layouts.app')

@section('content')
@php
    $myEnrollments = \App\Models\Inscripcion::where('user_id', Auth::id())->where('status', 'Inscrito')->count();
    $openCalls = \App\Models\Convocatoria::where('status', 'Abierta')->where('quota', '>', 0)->count();
    $nextCall = \App\Models\Convocatoria::where('status', 'Abierta')->where('start_date', '>=', now()->toDateString())->orderBy('start_date')->first();
@endphp
<main class="container py-5">
    <div class="section-heading">
        <div>
            <p class="eyebrow">Portal del aprendiz</p>
            <h1>Bienvenido, {{ Auth::user()->name }}</h1>
            <p>Consulta tu espacio personal de formación.</p>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-4"><article class="pillar h-100"><p class="eyebrow">Mi actividad</p><h2>{{ $myEnrollments }}</h2><p>Mis inscripciones</p></article></div>
        <div class="col-md-4"><article class="pillar h-100"><p class="eyebrow">Oportunidades</p><h2>{{ $openCalls }}</h2><p>Convocatorias abiertas</p></article></div>
        <div class="col-md-4"><article class="pillar h-100"><p class="eyebrow">Próxima fecha</p><h2>{{ $nextCall ? $nextCall->start_date->format('d/m/Y') : 'No disponible' }}</h2><p>Próxima convocatoria</p></article></div>
    </div>

    <a class="sena-button sena-button--light mb-4" href="{{ route('portal.convocatorias') }}">Explorar programas <i class="fas fa-arrow-right" aria-hidden="true"></i></a>

    <div class="pillar-grid">
        <article class="pillar">
            <i class="fas fa-user-graduate" aria-hidden="true"></i>
            <h2>Mi información</h2>
            <p><strong>Nombre:</strong> {{ Auth::user()->name }}</p>
            <p><strong>Correo:</strong> {{ Auth::user()->email }}</p>
            <p><strong>Rol:</strong> Aprendiz</p>
        </article>
        <article class="pillar">
            <i class="fas fa-book-open" aria-hidden="true"></i>
            <h2>Programas disponibles</h2>
            <p>Consulta las convocatorias abiertas de los programas de formación.</p>
            <a class="sena-button" href="{{ route('portal.convocatorias') }}">Ver programas <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
        </article>
        <article class="pillar">
            <i class="fas fa-clipboard-list" aria-hidden="true"></i>
            <h2>Mis inscripciones</h2>
            <p>Consulta el estado de tus inscripciones.</p>
            <a class="sena-button" href="{{ route('portal.mis-inscripciones') }}">Ver inscripciones <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
        </article>
    </div>
</main>
@endsection
