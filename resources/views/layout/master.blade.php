<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Lakitas de Arica">
        <meta name="author" content="Sebastián Aguilera <sebastian.aguilera@indivisual.cl>">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{ asset('images/favicon/favicon32.png') }}" sizes="32x32" />
        <link rel="icon" href="{{ asset('images/favicon/favicon192.png') }}" sizes="192x192" />
        <link rel="apple-touch-icon" href="{{ asset('images/favicon/favicon180.png') }}" />

        <title>@yield('title_1', config('app.name')) - @yield('title_2', '')</title>

        @yield('pre_css')

        <link rel="stylesheet" href="{{ mix('css/core.css') }}">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @yield('css')

        @livewireStyles
    </head>
    <body data-url="{{ url('/') }}">

        @if (!Request::is('/'))
            @include('layout.menu')
        @endif

        @include('layout.data-menu')

        <main>
            @yield('content')
        </main>

        @include('layout.footer')

        @yield('pre_js')

        <script src="{{ mix('js/core.js') }}"></script>

        @yield('js')

        <script>
            $(function(){
                $('.open-menu').on('click',function(){ $('.data-menu').removeClass('d-none'); });
                $('.close-menu').on('click',function(){ $('.data-menu').addClass('d-none'); });
            });
        </script>

        @livewireScripts
    </body>
</html>
