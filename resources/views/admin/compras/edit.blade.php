@extends('adminlte::page')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin/compras') }}">Compras</a></li>
            <li class="breadcrumb-item active" aria-current="page">Compra Nro {{ $compra->id }}</li>
        </ol>
    </nav>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title"><b>Paso 1 | Compra creada</b></h3>

                    <div class="card-tools">

                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: block;">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="proveedor_id">Proveedores </label>
                                        <p>{{ $compra->proveedor->nombre }}</p>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="fecha">Fecha de la compra </label>
                                        <p>{{ $compra->fecha }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="observaciones">Observaciones </label>
                                        <p>{{ $compra->observaciones }}</p>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="observaciones">Estado de la compra </label>
                                        <p>{{ $compra->estado }}</p>
                                    </div>
                                </div>

                                <div class="col-md-2">

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Paso 2 | Agregar productos</b></h3>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: block;">

                    <livewire:admin.compras.items-compra :compra="$compra" />

                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title"><b>Paso 3 | Finalizar compra</b></h3>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: block;">
                    <form action="{{ route('compras.finalizarCompra', $compra) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="sucursal_id">Sucursal <sup class="text-danger">(*)</sup></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                                        </div>
                                        <select name="sucursal_id" id="sucursal_id" class="form-control" required>
                                            <option value="">Seleccione una sucursal...</option>
                                            @foreach ($sucursales as $sucursal)
                                                <option value="{{ $sucursal->id }}"
                                                    {{ old('sucursal_id') == $sucursal->id ? 'selected' : '' }}>
                                                    {{ $sucursal->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('sucursal_id')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <hr>
                                <div class="form-group">
                                    <a href="{{ route('compras.enviarCorreo', $compra) }}" class="btn btn-primary"><i
                                            class="fas fa-envelope"></i> Enviar correo al proveedor</a>
                                    <button class="btn btn-success" type="submit"><i class="fas fa-check"></i> Finalizar
                                        compra</button>
                                </div>
                            </div>
                        </div>
                    </form>


                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        .select2-container .select2-selection--single {
            height: 40px !important;
        }
    </style>
@stop

@section('js')
    <script>
        $('.select2').select2({});
    </script>
@stop
