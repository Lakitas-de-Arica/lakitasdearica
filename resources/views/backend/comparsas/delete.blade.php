@extends('adminlte::page')

@section('title', 'Noticias - ' . config('app.name'))

@section('css')

@stop

@section('content_header')
    <h1 class="m-0 text-dark">Eliminar noticia</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-6">
            @livewire('news.delete', ['new' => $new, 'urlPrevious' => $urlPrevious])
        </div>
    </div>
@stop
