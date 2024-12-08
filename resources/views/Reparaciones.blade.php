@extends('adminlte::page')

@section('content_header')
    <h1>Gestión de Reparaciones</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">Listado de Reparaciones</h5>
                </div>
                <div class="text-center my-3">
                  <button type="button" class="btn btn-sm btn-primary shadow" data-toggle="modal" data-target="#nuevaReparacionModal">
                     <i class="fas fa-plus-circle"></i> Agregar
                  </button>
                </div>
                <div class="card-body bg-light">
                    <div class="table-responsive">
                        <table id="reparaciones-table" class="table table-hover table-striped">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>ID Reparación</th>
                                    <th>Código Vehículo</th>
                                    <th>Descripción</th>
                                    <th>Fecha Reparación</th>
                                    <th>Costo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reparaciones as $reparacion)
                                <tr>
                                    <td>{{ $reparacion["cod_reparacion"] }}</td>
                                    <td>{{ $reparacion["cod_vehiculo"] }}</td>
                                    <td>{{ $reparacion["descripcion"] }}</td>
                                    <td>{{ $reparacion["fecha_reparacion"] }}</td>
                                    <td>{{ $reparacion["costo"] }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning shadow" data-toggle="modal" data-target="#editarReparacionModal{{ $reparacion['cod_reparacion'] }}">
                                            <i class="fas fa-edit"></i> Editar
                                        </button>
                                    </td>
                                </tr>

                                <!-- Modal de editar reparación -->
                                <div class="modal fade" id="editarReparacionModal{{ $reparacion['cod_reparacion'] }}" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header bg-warning text-dark">
                                                <h5 class="modal-title">Editar Reparación</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="editar-reparacion-form" data-id="{{ $reparacion['cod_reparacion'] }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="cod_vehiculo">Código Vehículo:</label>
                                                        <input type="text" class="form-control" name="cod_vehiculo" value="{{ $reparacion['cod_vehiculo'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="descripcion">Descripción:</label>
                                                        <input type="text" class="form-control" name="descripcion" value="{{ $reparacion['descripcion'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fecha_reparacion">Fecha Reparación:</label>
                                                        <input type="date" class="form-control" name="fecha_reparacion" value="{{ $reparacion['fecha_reparacion'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="costo">Costo:</label>
                                                        <input type="number" class="form-control" name="costo" value="{{ $reparacion['costo'] }}" required>
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
                    <p>© Gestión de Reparaciones</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de nueva reparación -->
<div class="modal fade" id="nuevaReparacionModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Agregar Nueva Reparación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="nueva-reparacion-form">
                    @csrf
                    <div class="form-group">
                        <label for="cod_vehiculo">Código Vehículo:</label>
                        <input type="text" class="form-control" name="cod_vehiculo" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <input type="text" class="form-control" name="descripcion" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_reparacion">Fecha Reparación:</label>
                        <input type="date" class="form-control" name="fecha_reparacion" required>
                    </div>
                    <div class="form-group">
                        <label for="costo">Costo:</label>
                        <input type="number" class="form-control" name="costo" required>
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
        $('#reparaciones-table').DataTable({
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search": "Buscar:",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });

        // AJAX para agregar nueva reparación
        $('#nueva-reparacion-form').on('submit', function(event) {
            event.preventDefault();
            var formData = $(this).serialize();

            $.ajax({
                url: '{{ route("reparaciones.crear") }}',
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

        // AJAX para editar reparación
        $('.editar-reparacion-form').on('submit', function(event) {
            event.preventDefault();
            var reparacionId = $(this).data('id');
            var formData = $(this).serialize();

            $.ajax({
                url: '{{ route("reparaciones.actualizar", "") }}/' + reparacionId,
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
@endsection