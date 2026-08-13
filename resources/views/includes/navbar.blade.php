
<nav class="navbar navbar-expand-lg text-white" style="background: linear-gradient(90deg, #71E26B 0%, #39A900 100%); box-shadow: 0 8px 16px rgba(57, 169, 0, 0.15);">
    <div class="container-fluid" style="padding: 0 32px;">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-white" href="/" style="font-weight: 600; font-size: 1.05rem;">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="modulosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-weight: 600; font-size: 1.05rem;">
                        Módulos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="modulosDropdown">
                        <li><a class="dropdown-item" href="{{ route('area.index') }}"><i class="fas fa-map-marked-alt" style="margin-right: 8px; color: #39A900;"></i>Áreas</a></li>
                        <li><a class="dropdown-item" href="{{ route('trainingCenter.index') }}"><i class="fas fa-building" style="margin-right: 8px; color: #39A900;"></i>Centros de Formación</a></li>
                        <li><a class="dropdown-item" href="{{ route('computer.index') }}"><i class="fas fa-desktop" style="margin-right: 8px; color: #39A900;"></i>Computadores</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('teacher.index') }}"><i class="fas fa-chalkboard-teacher" style="margin-right: 8px; color: #39A900;"></i>Docentes</a></li>
                        <li><a class="dropdown-item" href="{{ route('course.index') }}"><i class="fas fa-book-open" style="margin-right: 8px; color: #39A900;"></i>Cursos</a></li>
                        <li><a class="dropdown-item" href="{{ route('apprentice.index') }}"><i class="fas fa-user-graduate" style="margin-right: 8px; color: #39A900;"></i>Aprendices</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
