@extends('adminlte::page')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin/categorias') }}">Categorias</a></li>
            <li class="breadcrumb-item active" aria-current="page">Datos de la categoría</li>
        </ol>
    </nav>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title"><b>Categoría</b></h3>

                    <div class="card-tools">

                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: block;">
                    
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nombre">Nombre de la categoría </label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-tags"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                        placeholder="Ingrese el nombre de la categoría" value="{{ $categoria->nombre }}" readonly>
                                    </div>
                                    @error('nombre')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nombre">Descripción de la categoría (opcional)</label>
                                    <textarea class="form-control" id="descripcion" name="descripcion"
                                        placeholder="Ingrese una breve descripción de la categoría" readonly>{{ $categoria->descripcion}}</textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group d-flex justify-content-between">
                                    <a href="{{ url('/admin/categorias') }}" class="btn btn-secondary">Volver</a>
                                    
                                </div>
                            </div>
                        </div>
                    
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    @stop

    @section('css')
        {{-- Add here extra stylesheets --}}
        {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    @stop

    @section('js')
   
    @stop
