@extends('adminlte::page')

@section('title', 'Páginas - ' . config('app.name'))

@section('adminlte_css')
@stop

@section('content_header')
    <h1 class="m-0 text-dark">Páginas</h1>
@stop

@section('content')

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
                    @livewire('pages.show')
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
