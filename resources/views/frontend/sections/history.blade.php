@extends('layout.master')

@section('title_1', 'Lakitas de Arica')
@section('title_2', 'Historia')

@section('pre_css')
@endsection

@section('css')

@endsection

@section('content')

<div class="container-fluid mt-md-5 mt-0">
    <div class="container py-5">
        <div class="row pt-5 pb-3 justify-content-center">
            <div class="col-md-4 text-start col-title-section">
                <p>LAKITAS DE ARICA</p>
                <h2 class="mb-5">Historia</h2>
            </div>
            <div class="col-md-6">
                {!! $page->text !!}

                <div class="row border-bottom-1 border-top-1 py-5 px-3 mt-5">
                    <div class="col-8">
                        <a href="{{ route('history.comparsashistoricas') }}" class="link-bigger">Comparsas Históricas</a>
                    </div>
                    <div class="col-4 text-end">
                        <a href="{{ route('history.comparsashistoricas') }}" class="link-bigger">
                            <img src="{{ asset('images/arrow-right.svg') }}" class="img-fluid">
                        </a>
                    </div>
                </div>

                <div class="row border-bottom-1 py-5 px-3">
                    <div class="col-8">
                        <a href="{{ route('history.viejossopladores') }}" class="link-bigger">Viejos Sopladores</a>
                    </div>
                    <div class="col-4 text-end">
                        <a href="{{ route('history.viejossopladores') }}" class="link-bigger">
                            <img src="{{ asset('images/arrow-right.svg') }}" class="img-fluid">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @if($page->gallery == 1)
        <div class="row justify-content-center">
            <div class="col-md-12">
                @livewire('multimedia.gallery')
            </div>
        </div>
        @endif
    </div>
</div>

@include('frontend.sections.blocks-publish')

@stop

@section('pre_js')
@endsection

@section('js')

    @stack('scripts')
@endsection
