@extends('adminlte::page')

@section('title', 'Multimedia - ' . config('app.name'))

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@stop

@section('content_header')
    <h1 class="m-0 text-dark">Crear multimedia</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            @livewire('multimedia.create', [
                'urlPrevious' => $urlPrevious,
                'comparsa_id' => $comparsa_id
            ])
        </div>
    </div>
@stop
