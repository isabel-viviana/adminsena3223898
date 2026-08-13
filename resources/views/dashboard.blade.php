@extends('layouts.app')

@section('content')

<div class="home-page">
    <section class="home-hero-modern" style="background: linear-gradient(135deg, #39A900 0%, #2d8300 100%);" aria-label="Bienvenida institucional">
        <div class="home-hero-modern__content">
            <h1 style="color: #ffffff; font-size: clamp(2rem, 3.5vw, 3rem); font-weight: 600; text-shadow: none; margin-bottom: 16px; letter-spacing: -0.5px;">Impulsando la educación técnica y tecnológica del <span style="color: #ffffff; font-weight: 700;">SENA</span></h1>
            <p style="font-size: 1.05rem; color: rgba(255, 255, 255, 0.95); text-shadow: none;">Sistema de gestión integral para centros de formación</p>
        </div>
    </section>

    <section class="home-carousel-modern" aria-label="Galería institucional del SENA">
        <div id="homeCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="0" class="active" aria-label="Slide 1" aria-current="true"></button>
                <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://images.unsplash.com/photo-1513258496099-48168024aec0?auto=format&fit=crop&w=1200&q=80" class="d-block w-100" alt="Ambientes de formación del SENA">
                </div>
                <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&w=1200&q=80" class="d-block w-100" alt="Tecnología aplicada a la formación">
                </div>
                <div class="carousel-item">
                    <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=1200&q=80" class="d-block w-100" alt="Trabajo colaborativo e innovación en formación">
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#homeCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#homeCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
    </section>
</div>

@endsection
