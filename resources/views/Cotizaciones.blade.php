@extends('adminlte::page')
@section('content_header')
    <h1>Gestión de Cotizaciones</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Listado de Cotizaciones</h5>
                    <button type="button" class="btn btn-sm btn-primary shadow" data-toggle="modal" data-target="#nuevaCotizacionModal">
                        <i class="fas fa-plus-circle"></i> Agregar
                    </button>
                </div>
                <div class="card-body bg-light">
                    <div class="table-responsive">
                        <table id="cotizaciones-table" class="table table-hover table-dark">
                            <thead class="bg-green text-white">
                                <tr>
                                    <th>Código de Cotización</th>
                                    <th>Código de Persona</th>
                                    <th>Fecha</th>
                                    <th>Descripción</th>
                                    <th>Monto</th>
                                    <th>Código de Cliente</th>
                                    <th>Código de Empleado</th>
                                    <th>Cantidad</th>
                                    <th>Tipo de Producto</th>
                                    <th>Estado del Producto</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cotizaciones as $cotizacion)
                                <tr>
                                    <td>{{ $cotizacion["cod_cotizacion"] }}</td>
                                    <td>{{ $cotizacion["cod_persona"] }}</td>
                                    <td>{{ $cotizacion["fecha"] }}</td>
                                    <td>{{ $cotizacion["descripcion"] }}</td>
                                    <td>{{ $cotizacion["monto"] }}</td>
                                    <td>{{ $cotizacion["cod_cliente"] }}</td>
                                    <td>{{ $cotizacion["cod_empleado"] }}</td>
                                    <td>{{ $cotizacion["cantidad"] }}</td>
                                    <td>{{ $cotizacion["tipo_producto"] }}</td>
                                    <td>{{ $cotizacion["estado_producto"] }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning shadow" data-toggle="modal" data-target="#editarCotizacionModal{{ $cotizacion['cod_cotizacion'] }}">
                                            <i class="fas fa-edit"></i> Editar
                                        </button>
                                    </td>
                                </tr>
                                <!-- Modal para editar cotización -->
                                                               <!-- Modal para editar cotización -->
                                <div class="modal fade" id="editarCotizacionModal{{ $cotizacion['cod_cotizacion'] }}" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header bg-warning text-dark">
                                                <h5 class="modal-title">Editar Cotización</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="editar-cotizacion-form" data-id="{{ $cotizacion['cod_cotizacion'] }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="cod_detalle">Código de Detalle:</label>
                                                        <input type="text" class="form-control" name="cod_detalle" value="{{ $cotizacion['cod_detalle'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cod_persona">Código de Persona:</label>
                                                        <input type="text" class="form-control" name="cod_persona" value="{{ $cotizacion['cod_persona'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fecha">Fecha:</label>
                                                        <input type="date" class="form-control" name="fecha" value="{{ $cotizacion['fecha'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="descripcion">Descripción:</label>
                                                        <input type="text" class="form-control" name="descripcion" value="{{ $cotizacion['descripcion'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="monto">Monto:</label>
                                                        <input type="number" class="form-control" name="monto" value="{{ $cotizacion['monto'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cod_cliente">Código de Cliente:</label>
                                                        <input type="text" class="form-control" name="cod_cliente" value="{{ $cotizacion['cod_cliente'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cod_empleado">Código de Empleado:</label>
                                                        <input type="text" class="form-control" name="cod_empleado" value="{{ $cotizacion['cod_empleado'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cantidad">Cantidad:</label>
                                                        <input type="number" class="form-control" name="cantidad" value="{{ $cotizacion['cantidad'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tipo_producto">Tipo de Producto:</label>
                                                        <input type="text" class="form-control" name="tipo_producto" value="{{ $cotizacion['tipo_producto'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="estado_producto">Estado del Producto:</label>
                                                        <input type="text" class="form-control" name="estado_producto" value="{{ $cotizacion['estado_producto'] }}" required>
                                                    </div>
                                                    <button type="submit" class="btn btn-warning btn-block">Guardar</button>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>            
                                @endforeach    
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-center bg-dark text-white">
                    <p>© Gestión de Cotizaciones</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal para agregar nueva cotización -->
<div class="modal fade" id="nuevaCotizacionModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Agregar Nueva Cotización</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="nueva-cotizacion-form">
                    @csrf
                    <div class="form-group">
                        <label for="cod_persona">Código de Persona:</label>
                        <input type="text" class="form-control" name="cod_persona" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha:</label>
                        <input type="date" class="form-control" name="fecha" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <input type="text" class="form-control" name="descripcion" required>
                    </div>
                    <div class="form-group">
                        <label for="monto">Monto:</label>
                        <input type="number" class="form-control" name="monto" required>
                    </div>
                    <div class="form-group">
                        <label for="cod_cliente">Código de Cliente:</label>
                        <input type="text" class="form-control" name="cod_cliente" required>
                    </div>
                    <div class="form-group">
                        <label for="cod_empleado">Código de Empleado:</label>
                        <input type="text" class="form-control" name="cod_empleado" required>
                    </div>
                    <div class="form-group">
                        <label for="cantidad">Cantidad:</label>
                        <input type="number" class="form-control" name="cantidad" required>
                    </div>
                    <div class="form-group">
                        <label for="tipo_producto">Tipo de Producto:</label>
                        <input type="text" class="form-control" name="tipo_producto" required>
                    </div>
                    <div class="form-group">
                        <label for="estado_producto">Estado del Producto:</label>
                        <input type="text" class="form-control" name="estado_producto" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
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
        $('#cotizaciones-table').DataTable({
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
        // AJAX para agregar nueva cotización
        $('#nueva-cotizacion-form').on('submit', function(event) {
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                url: '{{ route("cotizaciones.crear") }}',
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

        // AJAX para editar cotización
        $('.editar-cotizacion-form').on('submit', function(event) {
        event.preventDefault();
        var cotizacionId = $(this).data('id');
        var formData = $(this).serialize();
        $.ajax({
            url: '{{ route("cotizaciones.actualizar", "") }}/' + cotizacionId,
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