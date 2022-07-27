@extends('adminlte::page')

@section('title', 'Multimedia - ' . config('app.name'))

@section('css')

@stop

@section('content_header')
    <h1 class="m-0 text-dark">Eliminar archivo multimedia</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-6">
            @livewire('multimedia.delete', ['multimedia' => $multimedia, 'urlPrevious' => $urlPrevious])
        </div>
    </div>
@stop
