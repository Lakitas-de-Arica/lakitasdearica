@extends('adminlte::page')

@section('title', 'Multimedia - ' . config('app.name'))

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        .ck.ck-editor__main .ck-content {
            min-height: 250px;
        }
    </style>
@stop

@section('content_header')
    <h1 class="m-0 text-dark">Editar multimedia</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            @livewire('multimedia.edit', ['multimedia' => $multimedia, 'urlPrevious' => $urlPrevious])
        </div>
    </div>
@stop
