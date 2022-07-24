@extends('adminlte::page')

@section('title', 'Multimedia - ' . config('app.name'))

@section('adminlte_css')
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        [x-cloak] { display: none !important; }

        .rounded-circle {
            width: 60px;
            height: 60px;
        }
    </style>
@stop

@section('content_header')
    <h1 class="m-0 text-dark">Multimedia</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <a href="{{ route('admin.multimedia.create') }}" class="btn btn-primary my-3">Crear multimedia</a>
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
                    <livewire:multimedia.data-table />
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
