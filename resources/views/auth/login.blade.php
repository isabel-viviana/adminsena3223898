@extends('layouts.app')

@section('content')
<main class="login-page">
    <div class="login-intro">
        <p class="eyebrow">Portal administrativo SENA</p>
        <h1>Una cuenta para seguir haciendo.</h1>
        <p>Ingresa al espacio de gestión de centros de formación, cursos, equipos y talento humano.</p>
        <div class="login-stamp" aria-hidden="true"><img src="{{ asset('assets/png-clipart-logo-sena-la-granja-leaf-text.png') }}" alt=""><span>Formación<br>para el trabajo</span></div>
    </div>
    <section class="login-panel" aria-labelledby="login-title">
        <a class="login-back" href="{{ url('/') }}"><i class="fas fa-arrow-left" aria-hidden="true"></i> Volver al inicio</a>
        <div class="login-panel__heading"><span class="profile-avatar"><i class="fas fa-user" aria-hidden="true"></i></span><p class="eyebrow">Acceso</p><h2 id="login-title">Inicia sesión</h2><p>Es un acceso de demostración para visualizar la experiencia.</p></div>
        <form id="demoLoginForm" class="login-form" action="#" method="post">
            <label for="email">Correo electrónico</label>
            <input id="email" name="email" type="email" placeholder="nombre@correo.com" required>
            <label for="password">Contraseña</label>
            <div class="password-field"><input id="password" name="password" type="password" placeholder="••••••••" required><button type="button" data-password-toggle aria-label="Mostrar contraseña"><i class="fas fa-eye"></i></button></div>
            <div class="login-options"><label><input type="checkbox"> Recordarme</label><a href="#">¿Olvidaste tu contraseña?</a></div>
            <button class="sena-button sena-button--login" type="submit">Ingresar <i class="fas fa-arrow-right" aria-hidden="true"></i></button>
            <p class="demo-message" id="demoMessage" role="status" aria-live="polite"></p>
        </form>
        <p class="login-note"><i class="fas fa-info-circle" aria-hidden="true"></i> Esta pantalla es únicamente visual. No crea usuarios ni guarda datos.</p>
    </section>
</main>
@endsection

@push('scripts')
<script>
    const demoLoginForm = document.getElementById('demoLoginForm');
    const demoMessage = document.getElementById('demoMessage');
    const passwordToggle = document.querySelector('[data-password-toggle]');
    if (demoLoginForm) {
        demoLoginForm.addEventListener('submit', function (event) {
            event.preventDefault();
            demoMessage.textContent = 'Demostración: el formulario está listo, pero no inicia una sesión real.';
        });
    }
    if (passwordToggle) {
        passwordToggle.addEventListener('click', function () {
            const password = document.getElementById('password');
            const isPassword = password.type === 'password';
            password.type = isPassword ? 'text' : 'password';
            this.setAttribute('aria-label', isPassword ? 'Ocultar contraseña' : 'Mostrar contraseña');
            this.innerHTML = `<i class="fas fa-eye${isPassword ? '-slash' : ''}"></i>`;
        });
    }
</script>
@endpush
