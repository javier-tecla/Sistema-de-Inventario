@extends('adminlte::page')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin/sucursales') }}">Productos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detalle del producto</li>
        </ol>
    </nav>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title"><b>Datos registrados</b></h3>

                    <div class="card-tools">

                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: block;">


                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nombre">Categoría</label>
                                        <p>{{ $producto->categoria->nombre }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="codigo">Código</label>
                                        <p>{{ $producto->codigo }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <p>{{ $producto->nombre }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="descripcion">Descripción</label>
                                        <p>{!! $producto->descripcion !!}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="precio_compra">Precio compra</label>
                                        <p>{{ $producto->precio_compra }}</p>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="precio_venta">Precio venta</label>
                                        <p>{{ $producto->precio_venta }}</p>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="stock_minimo">Stock mínimo</label>
                                        <p>{{ $producto->stock_minimo }}</p>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="stock_maximo">Stock maximo</label>
                                        <p>{{ $producto->stock_maximo }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="unidad_medida">Unidad de medida</label>
                                        <p>{{ $producto->unidad_medida }}</p>
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="estado">Estado</label>
                                        @if ($producto->estado == '1')
                                            <span class="badge badge-success">Activo</span>
                                        @else
                                            <span class="badge badge-success">Inactivo</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="imagen">Imagen del producto</label>
                                        <br>
                                        <img src="{{ asset('storage/' . $producto->imagen) }}" width="100%" alt="">

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group d-flex justify-content-between">
                            <a href="{{ url('/admin/productos') }}" class="btn btn-secondary">Volver</a>

                        </div>
                    </div>
                </div>

            </div>
            <!-- /.card-body -->
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
