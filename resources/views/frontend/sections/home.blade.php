@extends('layout.master')

@section('title_1', 'Lakitas de Arica')
@section('title_2', 'Inicio')

@section('pre_css')
@endsection

@section('css')

@endsection

@section('content')

<div class="container-fluid container-head-home">
    <div class="row">
        <div class="col-md-7 px-0 banner-home" style="background-image: url('{{ asset('images/img-home.jpg') }}');"></div>

        <div class="col-md-5 bg-yellow p-3 p-md-5">
            <div class="row px-2 pe-md-5">
                <div class="col-md-12 text-end pb-2 pb-md-5 pe-3 pe-md-5">
                    <button class="btn-menu open-menu">
                        MENÚ
                        <img src="{{ asset('images/menu-icon.png') }}">
                    </button>
                </div>
                <div class="col-md-12 p-3 p-md-5 mt-2 mt-md-5">
                    <img src="{{ asset('images/LakitasdeArica.png') }}" class="img-fluid my-5 d-none d-md-block">
                    <img src="{{ asset('images/LakitasdeArica-movil.png') }}" class="img-fluid my-5 d-md-none d-block">
                    <p class="my-3">
                        Lakitas de Arica Los Mollo es una de las más antiguas y emblemáticas
                        comparsas de lakas del extremo norte de Chile. Orgullosos embajadores
                        del “estilo Jaiña” tanto dentro como fuera de la región de Arica y Parinacota,
                        destacan por sus contagiosas cumbias, ejecutadas con precisión y maestría.
                        Su variado repertorio mezcla tradición e innovación para seducir a un
                        amplio público y amenizar cualquier ocasión
                    </p>
                    <p class="mt-5">
                        <a href="">
                            CONOCE MÁS
                            <i class="fa-solid fa-circle-plus ms-3"></i>
                        </a>
                    </p>
                </div>
                <div class="col-md-12 d-md-none d-block text-center">
                    <img src="{{ asset('images/img-home.jpg') }}" class="img-fluid text-center">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="container pt-5">
        <div class="row pt-5 pb-3">
            <div class="col-6">
                <h2>Noticias</h2>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('news') }}">
                    TODAS LAS NOTICIAS
                    <i class="fa-solid fa-circle-plus ms-3"></i>
                </a>
            </div>
            <div class="col-md-12">
                <div class="w-100 border-bottom-1"></div>
            </div>
        </div>
        @livewire('news.show',['paginate' => false, 'numberOfItems' => 3])
    </div>
</div>

@include('frontend.sections.blocks-publish')

@stop

@section('pre_js')
@endsection

@section('js')

    @stack('scripts')
@endsection
