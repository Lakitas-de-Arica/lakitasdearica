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
                    Pellentesque vitae mauris ullamcorper, vulputate erat id, pulvinar eros.
                    Aliquam finibus bibendum metus, eu fermentum nibh eleifend at. Maecenas
                    at gravida sapien, et rhoncus dui. Etiam quis hendrerit ligula. Maecenas
                    sagittis feugiat lectus vel accumsan. Donec nulla diam, blandit at lectus vitae,
                    viverra laoreet tellus. Vestibulum rutrum, est ac blandit dignissim,
                    odio orci faucibus nibh, et dapibus velit mi sed leo.
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
