<nav class="navbar navbar-expand-lg shadow navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('images/logo-nav.svg') }}">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsMenuPrincipal" aria-controls="navbarsMenuPrincipal" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsMenuPrincipal">
            <ul class="navbar-nav ms-auto mb-2 mb-sm-0">
                <li class="nav-item ms-0 ms-md-2 my-2">
                    <a class="nav-link {{ (Request::is('/') ? 'active' : '') }}" aria-current="page" href="{{ route('home') }}">Inicio</a>
                </li>
                <li class="nav-item ms-0 ms-md-2 my-2">
                    <a class="nav-link {{ (Request::is('bagrou') ? 'active' : '') }}" aria-current="page" href="{{ route('home') }}">Quienes somos</a>
                </li>
                <li class="nav-item ms-0 ms-md-2 my-2 dropdown">
                    <a class="nav-link dropdown-toggle {{ (Request::is('soluciones/*') ? 'active' : '') }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Soluciones
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item {{ (Request::is('soluciones/gestion-documental') ? 'active' : '') }}" href="{{ route('home') }}">Gestión documental</a></li>
                        <li><a class="dropdown-item {{ (Request::is('soluciones/firma-electronica') ? 'active' : '') }}" href="{{ route('home') }}">Firma electrónica</a></li>
                    </ul>
                </li>
                <li class="nav-item ms-0 ms-md-2 my-2">
                    <a class="nav-link {{ (Request::is('contacto') ? 'active' : '') }}" aria-current="page" href="{{ route('home') }}">Contacto</a>
                </li>
            </ul>

            <a class="btn btn-primary ms-0 ms-md-5" href="https://clients.bagrou.com/" target="_blank">
                <img src="{{ asset('images/icon-btn.png') }}" class="me-md-0 me-xl-2">
                Iniciar sesión
            </a>
        </div>
    </div>
</nav>
