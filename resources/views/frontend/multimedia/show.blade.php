@extends('layout.master')

@section('title_1', 'Lakitas de Arica')
@section('title_2', 'Multimedia - ' . $multimedia->title)

@section('pre_css')
@endsection

@section('css')

@endsection

@section('content')

<div class="container-fluid mt-md-5 mt-0 container-multimedia">
    <div class="container py-5">
        <div class="row mt-5 mt-md-0">
            <div class="col mb-5">
                <a href="{{ $urlPrevious }}">
                    <img src="{{ asset('images/arrow-left.svg') }}" class="img-fluid me-4">
                    VOLVER Al CATÁLOGO
                </a>
            </div>
        </div>
        <div class="row g-5">
            <div class="col-md-8 pe-md-5 pe-0">
                {!! $multimedia->getFile() !!}
                <br>
                <p class="description mt-5">{!! $multimedia->description !!}</p>

                <div class="row mt-5">
                    <div class="col-md-6 link-previous-next">
                        @if (!is_null($previous))
                        <div class="row">
                            <div class="col-2 pt-2">
                                <a href="{{ $previous->publicLink() }}">
                                    <img src="{{ asset('images/arrow-left.svg') }}" class="img-fluid">
                                </a>
                            </div>
                            <div class="col-10">
                                <div class="text-truncate">
                                    <a href="{{ $previous->publicLink() }}" class="multimedia-comparsa">
                                        {{ $previous->comparsa->name }}
                                    </a>
                                </div>
                                <div class="text-truncate">
                                    <a href="{{ $previous->publicLink() }}" class="multimedia-title">
                                        {{ $previous->title }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-6 link-previous-next mt-3 mt-md-0">
                        @if (!is_null($next))
                        <div class="row">
                            <div class="col-10">
                                <div class="text-truncate">
                                    <a href="{{ $next->publicLink() }}" class="multimedia-comparsa">
                                        {{ $next->comparsa->name }}
                                    </a>
                                </div>
                                <div class="text-truncate">
                                    <a href="{{ $next->publicLink() }}" class="multimedia-title">
                                        {{ $next->title }}
                                    </a>
                                </div>
                            </div>
                            <div class="col-2 pt-2">
                                <a href="{{ $next->publicLink() }}">
                                    <img src="{{ asset('images/arrow-right.svg') }}" class="img-fluid">
                                </a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-4 px-0">
                <div class="sidebar-data-comparsa p-4">
                    <p class="mb-0">Agrupación</p>
                    <p class="fw-bold">
                        <a href="{{ $multimedia->comparsa->publicLink() }}">
                            {{ $multimedia->comparsa->name }}
                        </a>
                    </p>

                    <p class="mb-0">Titulo del material</p>
                    <p class="fw-bold">{{ $multimedia->title }}</p>

                    <p class="mb-0">Fecha registro</p>
                    <p class="fw-bold">{{ $multimedia->dateStringFormat() }}</p>

                    <p class="mb-0">Formato</p>
                    <p class="fw-bold">{{ $multimedia->format }}</p>

                    @if (!is_null($multimedia->link))
                    <p class="mb-0">Link</p>
                    <p class="fw-bold">{{ $multimedia->link }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('pre_js')
@endsection

@section('js')

    @stack('scripts')
@endsection
