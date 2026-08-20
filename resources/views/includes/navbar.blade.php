<nav class="sena-navbar navbar navbar-expand-lg" aria-label="Navegación principal">
    <div class="sena-navbar__inner container-fluid">
        <a class="sena-brand" href="{{ url('/') }}" aria-label="SENA, inicio">
            <img src="{{ asset('assets/png-clipart-logo-sena-la-granja-leaf-text.png') }}" alt="Logo SENA">
            <span><strong>SENA</strong><small>Servicio Nacional de Aprendizaje</small></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavigation" aria-controls="mainNavigation" aria-expanded="false" aria-label="Abrir menú"><span class="fas fa-bars"></span></button>
        <div class="collapse navbar-collapse" id="mainNavigation">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
                <li class="nav-item"><a class="nav-link" href="{{ url('/#conocenos') }}">¿Quiénes somos?</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Administración</a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="adminDropdown">
                        <li><span class="dropdown-header">Módulos de gestión</span></li>
                        <li><a class="dropdown-item" href="{{ route('area.index') }}"><i class="fas fa-map-marked-alt"></i>Áreas</a></li>
                        <li><a class="dropdown-item" href="{{ route('trainingCenter.index') }}"><i class="fas fa-building"></i>Centros de formación</a></li>
                        <li><a class="dropdown-item" href="{{ route('computer.index') }}"><i class="fas fa-desktop"></i>Computadores</a></li>
                        <li><a class="dropdown-item" href="{{ route('teacher.index') }}"><i class="fas fa-chalkboard-teacher"></i>Docentes</a></li>
                        <li><a class="dropdown-item" href="{{ route('course.index') }}"><i class="fas fa-book-open"></i>Cursos</a></li>
                        <li><a class="dropdown-item" href="{{ route('apprentice.index') }}"><i class="fas fa-user-graduate"></i>Aprendices</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/#contacto') }}">Contáctanos</a></li>
                <li class="nav-item"><button class="nav-search" type="button" data-search-trigger aria-label="Buscar"><i class="fas fa-search" aria-hidden="true"></i><span>Buscar</span></button></li>
                <li class="nav-item sena-profile"><span class="profile-avatar"><i class="fas fa-user" aria-hidden="true"></i></span><span class="profile-copy"><small>Visitante</small><strong>Administración pública</strong></span></li>
            </ul>
        </div>
    </div>
</nav>
<div class="search-drawer" data-search-drawer aria-hidden="true"><div class="search-drawer__inner"><label for="site-search">¿Qué estás buscando?</label><div><input id="site-search" type="search" placeholder="Buscar en el portal"><button type="button" data-search-close aria-label="Cerrar búsqueda"><i class="fas fa-times"></i></button></div></div></div>
