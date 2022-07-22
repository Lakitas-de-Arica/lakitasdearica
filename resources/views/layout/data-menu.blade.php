<div class="container-fluid position-fixed data-menu d-none overflow-auto h-100 fixed-top
    {{ (Request::is('noticias/publicar') ? 'nav-bg-blue' : '') }} {{ (Request::is('comparsas/publicar') ? 'nav-bg-purple' : '') }}">
    <div class="container">
        <div class="row">
            <div class="col-12 text-end my-4 py-md-5">
                <button class="btn-menu close-menu">
                    CERRAR
                    <img src="{{ asset('images/close-menu.svg') }}">
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <nav class="nav nav-pills nav-fill">
                    <a class="nav-link {{ (Request::is('/') ? 'active' : '') }}" aria-current="page" href="{{ route('home') }}">Inicio</a>
                    <a class="nav-link {{ (Request::is('introduccion') ? 'active' : '') }}" href="{{ route('introduction') }}">Introducción</a>
                    <a class="nav-link {{ (Request::is('historia') ? 'active' : '') }}" href="{{ route('history') }}">HISTORIA</a>
                    <a class="nav-link {{ (Request::is('comparsas*') ? 'active' : '') }}" href="{{ route('comparsa') }}">COMPARSAS</a>
                    <a class="nav-link {{ (Request::is('multimedia*') ? 'active' : '') }}" href="{{ route('multimedia') }}">MULTIMEDIA</a>
                    <a class="nav-link {{ (Request::is('contacto') ? 'active' : '') }}" href="{{ route('contact') }}">contacto</a>
                </nav>
            </div>
        </div>
        <div class="row py-4 py-md-5">
            <div class="col-md-12 border-bottom-1">
            </div>
        </div>
        <div class="row py-0 pb-3 py-md-5">
            <div class="col-md-6">
                <div class="mb-3 mb-md-5">
                    <p class="mb-2">Email</p>
                    <a href="mailto:contacto@lakitasdearica.cl">contacto@lakitasdearica.cl</a>
                </div>

                <div class="mb-3">
                    <p class="mb-2">Teléfono</p>
                    <a href="tel:+56935596144">+56 9 3559 6144</a><br>
                    <a href="tel:+56982506845">+56 9 8250 6845</a>
                </div>
            </div>
            <div class="col-md-6 text-start text-md-end">
                <a href="#">FACEBOOK</a><br>
                <a href="#">INSTAGRAM</a>
            </div>
        </div>
    </div>
</div>
