@extends('layout.master')

@section('title_1', 'Lakitas de Arica')
@section('title_2', 'Comparsas - ' . $comparsa->title)

@section('pre_css')
@endsection

@section('css')

@endsection

@section('content')

<div class="container-xxl">
    <div class="row">
        <div class="col-md-12 image-comparsa" style="background-image: url('{{ asset('storage/'.$comparsa->image) }}');"></div>
    </div>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 pt-5">
            <h1 class="mb-5">{{ $comparsa->name }}</h1>
            <p>{!! $comparsa->text !!}</p>

            @if ($comparsa->multimedia->first())
                <div class="multimedia">
                    <h3 class="mt-5 mb-4">CONTENIDO COMPARSA</h3>
                    <div class="row">
                        <div class="col-5">
                            <div class="img" style="height:174px; background-image: url('{{ asset('storage/'.$comparsa->multimedia->first()->publicImage()) }}')">
                                <div class="format">{{ $comparsa->multimedia->first()->format }}</div>
                            </div>
                        </div>
                        <div class="col-6 pt-4">
                            <p class="date">
                                {{ $comparsa->multimedia->first()->dateStringFormat() }}
                            </p>
                            <div class="title border-bottom-1" style="height:56px;">
                                <a href="{{ $comparsa->multimedia->first()->publicLink() }}" class="fw-bold" style="line-height: 17px;">
                                    {{ $comparsa->multimedia->first()->title }}
                                </a>
                            </div>
                            <div class="row pt-2">
                                <div class="col-6">
                                    <a href="{{ $comparsa->multimedia->first()->publicLink() }}">VER ARCHIVO</a>
                                </div>
                                <div class="col-6 text-end">
                                    <a href="{{ $comparsa->multimedia->first()->publicLink() }}">
                                        <img src="{{ asset('images/arrow-right.svg') }}" class="img-fluid">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-md-4 pt-5">
            <div class="sidebar-data-comparsa p-4">
                <h4>Información</h4>
                <div class="w-100 my-3"></div>

                <p class="mb-0">Fecha formación</p>
                <p class="fw-bold">{{ $comparsa->dateStringFormat() }}</p>

                <p class="mb-0">Localidad o barrio</p>
                <p class="fw-bold">{{ $comparsa->location }}</p>

                <p class="mb-0">Integrantes</p>
                <p class="fw-bold">{!! $comparsa->membersListFormat() !!}</p>

                <p class="mb-0">Nombre de contacto</p>
                <p class="fw-bold">{{ $comparsa->contact_name }}</p>

                <p class="mb-0">Email</p>
                <p class="fw-bold">{{ $comparsa->contact_email }}</p>

                <p class="mb-0">Teléfono</p>
                <p class="fw-bold">{{ $comparsa->contact_phone }}</p>

                <p class="mb-0">Contactos</p>
                <p class="fw-bold">
                    <a href="{{ $comparsa->web }}" target="_blank" class="fw-bold me-2">Web</a>
                    <a href="{{ $comparsa->facebook }}" target="_blank" class="fw-bold me-2">Facebook</a>
                    <a href="{{ $comparsa->instagram }}" target="_blank" class="fw-bold">Instagram</a>
                </p>
            </div>

            <div class="block-form-2 mt-5" style="max-width: 100%;">
                <h4>
                    Registra tu Comparsa
                </h4>
                <div class="row">
                    <div class="col-8">
                        <a href="{{ route('comparsa.publish') }}">IR AL FORMULARIO</a>
                    </div>
                    <div class="col-4 text-end">
                        <a href="{{ route('comparsa.publish') }}">
                            <img src="{{ asset('images/arrow-right.svg') }}" class="img-fluid">
                        </a>
                    </div>
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
