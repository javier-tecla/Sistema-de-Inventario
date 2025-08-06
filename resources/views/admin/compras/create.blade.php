@extends('adminlte::page')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin/compras') }}">Compras</a></li>
            <li class="breadcrumb-item active" aria-current="page">Creación de una compra</li>
        </ol>
    </nav>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Paso 1 | Registrar nueva compra</b></h3>

                    <div class="card-tools">

                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: block;">
                    <form action="{{ url('/admin/compras/create') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="proveedor_id">Proveedores <sup class="text-danger">(*)</sup></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-users"></i></span>
                                                </div>
                                                <select name="proveedor_id" id="proveedor_id" class="form-control" required>
                                                    <option value="">Seleccione una proveedor...</option>
                                                    @foreach ($proveedores as $proveedor)
                                                        <option value="{{ $proveedor->id }}"
                                                            {{ old('proveedor_id') == $proveedor->id ? 'selected' : '' }}>
                                                            {{ $proveedor->nombre . ' | ' . $proveedor->empresa }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('proveedor')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="fecha">Fecha de la compra <sup class="text-danger">(*)</sup></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                </div>
                                                <input type="date" name="fecha" id="fecha" class="form-control"
                                                    value="{{ old('fecha') }}" required>
                                            </div>
                                            @error('proveedor')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="observaciones">Observaciones </label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-list"></i></span>
                                                </div>
                                                <input type="text" name="observaciones" id="observaciones" class="form-control"
                                                    value="{{ old('observaciones') }}">
                                            </div>
                                            @error('observaciones')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group d-flex justify-content-between">
                                    <a href="{{ url('/admin/compras') }}" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-primary">Crear compra</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    @stop

    @section('css')
        <style>
            .ck.ck-editor {
                width: 100% !important;
            }

            .ck-editor__editable {
                width: 100% !important;
                min-height: 300px;
                box-sizing: border-box;
            }

            .ck.ck-toolbar {
                flex-wrap: wrap;
            }

            @media (max-width: 768px) {
                .ck-editor__editable {
                    min-height: 250px;
                    padding: 10px;
                }
            }
        </style>
    @stop

    @section('js')
        <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#descripcion'), {
                    toolbar: {
                        items: [
                            'heading', '|',
                            'bold', 'italic', 'underline', 'strikethrough', 'subscript', 'superscript', '|',
                            'link', 'bulletedList', 'numberedList', '|',
                            'outdent', 'indent', '|',
                            'alignment', '|',
                            'blockQuote', 'insertTable', 'mediaEmbed', '|',
                            'undo', 'redo', '|',
                            'fontBackgroundColor', 'fontColor', 'fontSize', 'fontFamily', '|',
                            'code', 'codeBlock', 'htmlEmbed', '|',
                            'sourceEditing'
                        ],
                        shouldNotGroupWhenFull: true
                    },
                    language: 'es'
                })
                .then(editor => {
                    // Forzar responsive después de crear el editor
                    const editorEl = editor.ui.view.element;
                    editorEl.style.width = '100%';
                    editorEl.querySelector('.ck-editor__editable').style.width = '100%';
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
    @stop
