@extends('adminlte::page')

@section('title', 'Noticias - ' . config('app.name'))

@section('adminlte_css')
    <style>
        [x-cloak] { display: none !important; }
    </style>
@stop

@section('content_header')
    <h1 class="m-0 text-dark">Noticias</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <a href="{{ route('admin.news.create') }}" class="btn btn-primary my-3">Crear noticia</a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show my-3">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <livewire:news.data-table />
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')

    <script>
        setTimeout(
            function()
            {
                $('.alert').alert('close')
            }, 3000)
    </script>

@endpush
