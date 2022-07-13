@extends('layout.master')

@section('title_1', 'Lakitas de Arica')
@section('title_2', 'Noticias - ' . $new->title)

@section('pre_css')
@endsection

@section('css')

@endsection

@section('content')

<div class="container-fluid mt-md-5 mt-0 container-new">
    <div class="container py-5">
        <div class="row pt-5 pb-3 justify-content-center">
            <div class="col-md-8 border-bottom-1 px-0">
                <h2 class="title">{{ $new->title }}</h2>
                <p class="date">{{ $new->dateStringFormat() }}</p>
            </div>

            <div class="col-md-8 px-0 mt-5">
                <p class="text">{!! $new->introduction !!}</p>
            </div>

            <div class="col-md-9 px-0 mt-5 text-center">
                <img src="{{ asset('storage/'.$new->image) }}" class="img-fluid">
            </div>

            <div class="col-md-8 px-0 mt-5">
                <p class="text">{!! $new->text !!}</p>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="container">
        <div class="row mb-5">
            <div class="col text-center">
                <h2>RELACIONADOS</h2>
            </div>
        </div>
        @livewire('news.related',['newId'=>$new->id])
    </div>
</div>

@stop

@section('pre_js')
@endsection

@section('js')

    @stack('scripts')
@endsection
