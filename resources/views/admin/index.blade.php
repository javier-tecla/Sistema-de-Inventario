@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Admin</p>
    <hr>

    <div class="row">

        <div class="col-md-3 col-sm-6 col-12">
            <a href="{{ url('/admin/sucursales') }}" class="info-box-icon">
                <div class="info-box">
                <span class="info-box-icon bg-info">
                    <img src="{{ url('/img/edificio.gif') }}" alt="">
                </span>

                <div class="info-box-content" style="color: black">
                    <span class="info-box-text"><b>Sucursales</b></span>
                    <span class="info-box-number">{{ $total_sucursales }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <a href="{{ url('/admin/categorias') }}" class="info-box-icon">
                <div class="info-box">
                <span class="info-box-icon bg-info">
                    <img src="{{ url('/img/lista.gif') }}" alt="">
                </span>

                <div class="info-box-content" style="color: black">
                    <span class="info-box-text"><b>Categorias</b></span>
                    <span class="info-box-number">{{ $total_categorias }}<span>
                </div>
                <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
