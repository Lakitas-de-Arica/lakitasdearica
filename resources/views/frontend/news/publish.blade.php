@extends('layout.master')

@section('title_1', 'Lakitas de Arica')
@section('title_2', 'Publica tu noticia')

@section('pre_css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('css')

@endsection

@section('content')

<div class="container-fluid mt-md-5 mt-0">
    <div class="container pt-5 pb-md-5 pb-3">
        <div class="row pt-5 pb-3">
            <div class="col-md-12 text-center col-title-section">
                <p>FORMULARIO</p>
                <h2>Publica tu Noticia</h2>
                <p>Completa las datos a continuación y publica tu noticia</p>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 mb-5">

                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @livewire('news.form-publish')
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
