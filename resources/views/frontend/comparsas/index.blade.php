@extends('layout.master')

@section('title_1', 'Lakitas de Arica')
@section('title_2', 'Catálogo de Comparsas')

@section('pre_css')
@endsection

@section('css')

@endsection

@section('content')

<div class="container-fluid mt-md-5 mt-0">
    <div class="container py-5">
        <div class="row pt-5 pb-3">
            <div class="col-md-6 text-start col-title-section">
                <p>CATÁLOGO</p>
                <h2 class="mb-5">Comparsas</h2>
                <p>
                    Esta sección contiene información sobre comparsas de lakitas ariqueñas que se encuentran actualmente activas. En ella se encuentran datos básicos de cada agrupación, como su fecha de formación, director, caporal y links a sus plataformas digitales, además de una breve reseña de cada conjunto musical, material audiovisual y los medios para contactarlos.
                    No pretende ser un catastro exhaustivo sino que se trata de un espacio que estará constantemente en construcción, ampliándose a medida que nuevas comparsas aporten sus datos al catálogo.
                </p>
            </div>
            <div class="col-md-6">
                <div class="block-form-2">
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
</div>

<div class="container-fluid">
    <div class="container">
        @livewire('comparsa.show')
    </div>
</div>

@stop

@section('pre_js')
@endsection

@section('js')

    @stack('scripts')
@endsection
