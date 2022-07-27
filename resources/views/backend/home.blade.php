@extends('adminlte::page')

@section('title', 'Dashboard - ' . config('app.name'))

@section('adminlte_css')
@stop

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $news }}</h3>
                    <p>Noticias</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('admin.news') }}" class="small-box-footer">Ver todas las noticias <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $comparsas }}</h3>
                    <p>Comparsas</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ route('admin.comparsa') }}" class="small-box-footer">Ver todas las comparsas <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $multimedia }}</h3>
                    <p>Archivos multimedia</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ route('admin.multimedia') }}" class="small-box-footer">Ver todos los archivos <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Páginas</h4>
                </div>
                <div class="card-body">
                    @livewire('pages.show')
                </div>
            </div>
        </div>
    </div>
@stop
