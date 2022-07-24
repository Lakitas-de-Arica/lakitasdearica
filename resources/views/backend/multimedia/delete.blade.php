@extends('adminlte::page')

@section('title', 'Comparsas - ' . config('app.name'))

@section('css')

@stop

@section('content_header')
    <h1 class="m-0 text-dark">Eliminar comparsa</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-6">
            @livewire('comparsa.delete', ['comparsa' => $comparsa, 'urlPrevious' => $urlPrevious])
        </div>
    </div>
@stop
