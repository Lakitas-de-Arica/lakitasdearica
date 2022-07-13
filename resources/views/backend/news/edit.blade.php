@extends('adminlte::page')

@section('title', 'Noticias - ' . config('app.name'))

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@stop

@section('content_header')
    <h1 class="m-0 text-dark">Editar noticia</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            @livewire('news.edit', ['new' => $new, 'urlPrevious' => $urlPrevious])
        </div>
    </div>
@stop
