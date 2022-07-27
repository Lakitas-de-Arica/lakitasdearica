@extends('layout.master')

@section('title_1', 'Lakitas de Arica')
@section('title_2', 'Comparsas históricas')

@section('pre_css')
@endsection

@section('css')

@endsection

@section('content')

<div class="container-fluid mt-md-5 mt-0">
    <div class="container py-5">
        <div class="row">
            <div class="col mb-0">
                <a href="{{ route('history') }}">
                    <img src="{{ asset('images/arrow-left.svg') }}" class="img-fluid me-4">
                    VOLVER A HISTORIA
                </a>
            </div>
        </div>
        <div class="row pt-5 pb-3">
            <div class="col-md-6 text-start col-title-section">
                <h2 class="mb-5">Comparsas históricas</h2>

                {!! $page->text !!}

                <div class="row border-bottom-1 border-top-1 py-5 px-3 mt-5">
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
            <div class="col-md-6">

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
