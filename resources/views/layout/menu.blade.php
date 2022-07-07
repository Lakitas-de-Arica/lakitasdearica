<div class="container-fluid container-nav py-3 fixed-top {{ (Request::is('noticias/publicar') ? 'nav-bg-blue' : '') }} {{ (Request::is('comparsas/publicar') ? 'nav-bg-purple' : '') }}">
    <div class="container">
        <div class="row">
            <div class="col-8 text-start">
                <a href="{{ route('home') }}" class="logo-nav">
                    LAKITAS DE ARICA
                </a>
            </div>
            <div class="col-4 text-end">
                <button class="btn-menu open-menu">
                    MENÚ
                    @if(Request::is('noticias/publicar') OR Request::is('comparsas/publicar'))
                        <img src="{{ asset('images/menu-icon-white.png') }}">
                    @else
                        <img src="{{ asset('images/menu-icon.png') }}">
                    @endif
                </button>
            </div>
        </div>
    </div>
</div>
