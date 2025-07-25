@extends('adminlte::page')

@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin/categorias') }}">Categorias</a></li>
            <li class="breadcrumb-item active" aria-current="page">Listado de categorías</li>
        </ol>
    </nav>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Categorías registradas</b></h3>

                    <div class="card-tools">
                        <a class="btn btn-primary" href="{{ url('/admin/categorias/create') }}">Crear nueva</a>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: block;">
                    <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categorias as $categoria)
                                <tr>
                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                    <td>{{ $categoria->nombre }}</td>
                                    <td>{{ $categoria->descripcion }}</td>
                                    <td style="text-align: center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ url('/admin/categorias/' . $categoria->id) }}"
                                                class="btn btn-info"><i class="fas fa-eye"></i> Ver</a>
                                            <a href="{{ url('/admin/categorias/' . $categoria->id . '/edit') }}"
                                                class="btn btn-success"><i class="fas fa-pencil-alt"></i> Editar</a>
                                            <form action="{{ url('/admin/categorias/' . $categoria->id) }}" id="miformulario{{ $categoria->id }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="preguntar{{ $categoria->id }}(event)">
                                                    <i class="fas fa-trash-alt"></i> Eliminar</button>
                                            </form>
                                            <script>
                                                function preguntar{{ $categoria->id }}(event) {
                                                        event.preventDefault();
                                                        Swal.fire({
                                                            title: "¿Desea eliminar este registro?",
                                                            text: "",
                                                            icon: "question",
                                                            showCancelButton: true,
                                                            confirmButtonColor: "#3085d6",
                                                            cancelButtonColor: "#d33",
                                                            confirmButtonText: "Si, eliminar!",
                                                            denyButtonText: "No, cancelar"
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                document.getElementById('miformulario{{ $categoria->id }}').submit();
                                                            }
                                                        });
                                                    }
                                            </script>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    @stop

    @section('css')
        <style>
            /* Fondo transparente y sin borde en el contenedor */
            #example1_wrapper .dt-buttons {
                background-color: transparent;
                box-shadow: none;
                border: none;
                display: flex;
                justify-content: center;
                /* Centra los botones */
                gap: 10px;
                /* Espaciado entre botones*/
                margin-bottom: 15px;
                /* Separar botones de la tabla */
            }

            /* Estilo personalizado para los botones */
            #example1_wrapper .btn {
                color: #fff;
                /* Color del tecto en blanco */
                border-radius: 4px;
                /* Border recomendados */
                padding: 5px 15px;
                /* Espaciado interno */
                font-size: 14px;
                /* Tamaño de fuente */
            }

            /* Colores por tipo de botón */
            .btn-danger {
                background-color: #dc3545;
                border: none;
            }

            .btn-success {
                background-color: #28a745;
                border: none;
            }

            .btn-info {
                background-color: #17a2b8;
                border: none;
            }

            .btn-warning {
                background-color: #ffc107;
                color: #212529;
                border: none;
            }

            .btn-default {
                background-color: #6e7176;
                color: #212529;
                border: none;
            }
        </style>
    @stop

    @section('js')
        <script>
            $(function() {
                $("#example1").DataTable({
                    "pageLength": 10,
                    "language": {
                        "emptyTable": "No hay información",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Categorias",
                        "infoEmpty": "Mostrando 0 a 0 de 0 Categorias",
                        "infoFiltered": "(Filtrado de_MAX_ total Categorias)",
                        "lengthMenu": "Mostrar _MENU_ Categorias",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscador:",
                        "zeroRecords": "Sin resultados encontrados",
                        "paginate": {
                            "first": "Primero",
                            "last": "Último",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    },
                    "responsive": true,
                    "lengthChange": true,
                    "autoWidth": false,
                    buttons: [{
                            text: '<i class="fas fa-copy"></i> COPIAR',
                            extend: 'copy',
                            className: 'btn btn-default'
                        },
                        {
                            text: '<i class="fas fa-file-pdf"></i> PDF',
                            extend: 'pdf',
                            className: 'btn btn-danger'
                        },
                        {
                            text: '<i class="fas fa-file-csv"></i> CSV',
                            extend: 'csv',
                            className: 'btn btn-info'
                        },
                        {
                            text: '<i class="fas fa-file-excel"></i> EXCEL',
                            extend: 'excel',
                            className: 'btn btn-success'
                        },
                        {
                            text: '<i class="fas fa-print"></i> IMPRIMIR',
                            extend: 'print',
                            className: 'btn btn-warning'
                        },
                    ]

                }).buttons().container().appendTo('#example1_wrapper .row:eq(0)');
            });
        </script>
    @stop
