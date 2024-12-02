@extends('adminlte::page')
@section('content_header')
    <h1>Gestión de Usuarios</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Listado de Usuarios</h5>
                    <button type="button" class="btn btn-sm btn-primary shadow" data-toggle="modal" data-target="#nuevoUsuarioModal">
                        <i class="fas fa-plus-circle"></i> Agregar
                    </button>
                </div>
                <div class="card-body bg-light">
                    <div class="table-responsive">
                        <table id="usuarios-table" class="table table-hover table-dark">
                            <thead class="bg-green text-white">
                                <tr>
                                    <th>Codigo Detalle</th>
                                    <th>Descripción</th>
                                    <th>Monto</th>
                                    <th>Codigo del cliente</th>
                                    <th>Codigo del empleado</th>
                                    <th>Cantidad</th>
                                    <th>Tipo de producto</th>
                                    <th>Estado del producto</th>
                                    <th>Código de la cotización</th>
                                    <th>Codigo de la persona</th>
                                    <th>Fecha</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cotizaciones as $detalles_cotizacion)
                                <tr>
                                    <td>{{ $detalles_cotizacion["cod_detalle"] }}</td>
                                    <td>{{ $detalles_cotizacion["descripcion"] }}</td>
                                    <td>{{ $detalles_cotizacion["monto"] }}</td>
                                    <td>{{ $detalles_cotizacion["cod_cliente"] }}</td>
                                    <td>{{ $detalles_cotizacion["cod_empleado"] }}</td>
                                    <td>{{ $detalles_cotizacion["cantidad"] }}</td>
                                    <td>{{ $detalles_cotizacion["tipo_producto"] }}</td>
                                    <td>{{ $detalles_cotizacion["estado_producto"] }}</td>
                                    <td>{{ $detalles_cotizacion["cod_cotizacion"] }}</td>
                                    <td>{{ $detalles_cotizacion["cod_persona"] }}</td>
                                    <td>{{ $detalles_cotizacion["fecha"] }}</td>
                                </tr>
                                <!-- Modal para editar usuario -->
                                
                                @endforeach    
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-center bg-dark text-white">
                    <p>© Gestión de Usuarios</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal para agregar nuevo usuario -->
<
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        // Configuración de DataTable
        $('#usuarios-table').DataTable({
            language: {
                lengthMenu: "Mostrar _MENU_ registros por página",
                zeroRecords: "No se encontraron resultados",
                info: "Mostrando página _PAGE_ de _PAGES_",
                infoEmpty: "No hay registros disponibles",
                infoFiltered: "(filtrado de _MAX_ registros totales)",
                search: "Buscar:",
                paginate: {
                    first: "<button class='btn btn-sm btn-primary pagination-btn'>Primero</button>",
                    last: "<button class='btn btn-sm btn-primary pagination-btn'>Último</button>",
                    next: "<button class='btn btn-sm btn-primary pagination-btn'>Siguiente</button>",
                    previous: "<button class='btn btn-sm btn-primary pagination-btn'>Anterior</button>"
                }
            },
            dom: '<"top"f>rt<"bottom"p><"clear">',
            pagingType: "simple",
            stateSave: true
        });

        // Funciones AJAX
        // AJAX para agregar nuevo usuario
        $('#nuevo-usuario-form').on('submit', function(event) {
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                url: '{{ route("usuarios.crear") }}',
                method: 'POST',
                data: formData,
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: response.success,
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.error,
                        });
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: xhr.responseText,
                    });
                }
            });
        });

        // AJAX para editar usuario
        $('.editar-usuario-form').on('submit', function(event) {
            event.preventDefault();
            var usuarioId = $(this).data('id');
            var formData = $(this).serialize();
            $.ajax({
                url: '{{ route("usuarios.actualizar", "") }}/' + usuarioId,
                method: 'PUT',
                data: formData,
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: response.success,
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.error,
                        });
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: xhr.responseText,
                    });
                }
            });
        });
    });
</script>

<style>
    .pagination-btn {
        margin-right: 10px; 
    }
</style>
@endsection