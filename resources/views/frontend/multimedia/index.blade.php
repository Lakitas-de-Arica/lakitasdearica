@extends('layout.master')

@section('title_1', 'Lakitas de Arica')
@section('title_2', 'Archivo Multimedia')

@section('pre_css')
@endsection

@section('css')

@endsection

@section('content')

<div class="container-fluid mt-5">
    <div class="container py-5">
        <div class="row pt-5 pb-0">
            <div class="col-md-12 text-center col-title-section">
                <p>ARCHIVO</p>
                <h2>MULTIMEDIA</h2>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="container">
        @livewire('multimedia.show')
    </div>
</div>

@stop

@section('pre_js')
@endsection

@section('js')
    @stack('scripts')
@endsection
