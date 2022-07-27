@extends('adminlte::page')

@section('title', 'Página - ' . config('app.name'))

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@stop

@section('content_header')
    <h1 class="m-0 text-dark">Editar Página</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            @livewire('pages.edit', ['page' => $page])
        </div>
    </div>
@stop
