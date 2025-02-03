@extends('layout.master')

@section('title_1', 'Lakitas de Arica')
@section('title_2', 'Introducción')

@section('pre_css')
@endsection

@section('css')
@endsection

@section('content')

<div class="container-fluid mt-md-5 mt-0">
    <div class="container py-5">
        <div class="row pt-5 pb-3 justify-content-center">
            <div class="col-md-4 text-start col-title-section">
                <p>SOBRE EL PROYECTO</p>
                <h2 class="mb-5">Introducción</h2>
            </div>
            <div class="col-md-6">
                {!! $page->text !!}
            </div>
        </div>
        @if($page->gallery == 1)
        <div class="row justify-content-center">
            <div class="col-md-10">
                @livewire('multimedia.gallery')
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                @livewire('multimedia.gallery-intro')
            </div>
        </div>
        @endif
    </div>
</div>

@stop

@section('pre_js')
@endsection

@section('js')
    @stack('scripts')
@endsection
