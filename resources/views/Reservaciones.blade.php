@extends('adminlte::page')

@section('content_header')
    <h1>Gestión de Reservaciones</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">Listado de Reservaciones</h5>
                    <!-- Botón para agregar una nueva reservación -->
                    <button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#nuevaReservacionModal">
                        <i class="fas fa-plus"></i> Agregar Reservación
                    </button>
                </div>
                <div class="card-body bg-light">
                    <div class="table-responsive">
                        <table id="reservaciones-table" class="table table-hover table-striped">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>ID Reservación</th>
                                    <th>Código Persona</th>
                                    <th>Código Vehículo</th>
                                    <th>Fecha Reservación</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reservaciones as $reservacion)
                                <tr>
                                    <td>{{ $reservacion['cod_reservacion'] }}</td>
                                    <td>{{ $reservacion['cod_persona'] }}</td>
                                    <td>{{ $reservacion['cod_vehiculo'] }}</td>
                                    <td>{{ \Carbon\Carbon::parse($reservacion['fecha_reservacion'])->format('Y-m-d') }}</td>
                                    <td>
                                        <!-- Botón para editar una reservación existente -->
                                        <button type="button" class="btn btn-sm btn-warning shadow" data-toggle="modal" data-target="#editarReservacionModal{{ $reservacion['cod_reservacion'] }}">
                                            <i class="fas fa-edit"></i> Editar
                                        </button>
                                    </td>
                                </tr>
                                <!-- Modal para editar reservación -->
                                <div class="modal fade" id="editarReservacionModal{{ $reservacion['cod_reservacion'] }}" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header bg-warning text-dark">
                                                <h5 class="modal-title">Editar Reservación</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="editar-reservacion-form" data-id="{{ $reservacion['cod_reservacion'] }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="cod_persona">Código Persona:</label>
                                                        <input type="text" class="form-control" name="cod_persona" value="{{ $reservacion['cod_persona'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cod_vehiculo">Código Vehículo:</label>
                                                        <input type="text" class="form-control" name="cod_vehiculo" value="{{ $reservacion['cod_vehiculo'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fecha_reservacion">Fecha Reservación:</label>
                                                        <input type="date" class="form-control" name="fecha_reservacion" value="{{ \Carbon\Carbon::parse($reservacion['fecha_reservacion'])->format('Y-m-d') }}" required>
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
                    <p>© Gestión de Reservaciones</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de nueva reservación -->
<div class="modal fade" id="nuevaReservacionModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Agregar Nueva Reservación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="nueva-reservacion-form">
                    @csrf
                    <div class="form-group">
                        <label for="cod_persona">Código Persona:</label>
                        <input type="text" class="form-control" name="cod_persona" required>
                    </div>
                    <div class="form-group">
                        <label for="cod_vehiculo">Código Vehículo:</label>
                        <input type="text" class="form-control" name="cod_vehiculo" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_reservacion">Fecha Reservación:</label>
                        <input type="date" class="form-control" name="fecha_reservacion" required>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        // Inicializar DataTable
        $('#reservaciones-table').DataTable({
            language: {
                lengthMenu: "Mostrar _MENU_ registros por página",
                zeroRecords: "No se encontraron resultados",
                info: "Mostrando página _PAGE_ de _PAGES_",
                infoEmpty: "No hay registros disponibles",
                infoFiltered: "(filtrado de _MAX_ registros totales)",
                search: "Buscar:",
                paginate: {
                    first: "Primero",
                    last: "Último",
                    next: "Siguiente",
                    previous: "Anterior"
                }
            },
            stateSave: true
        });

        // Agregar nueva reservación
        $('#nueva-reservacion-form').on('submit', function(event) {
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                url: '{{ route("reservaciones.crear") }}',
                method: 'POST',
                data: formData,
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: response.success,
                        }).then(() => {
                            location.reload(); // Recarga la página
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
                        text: 'Ocurrió un error al agregar la reservación.',
                    });
                }
            });
        });

        // Editar reservación
        $('.editar-reservacion-form').on('submit', function(event) {
            event.preventDefault();
            var reservacionId = $(this).data('id');
            var formData = $(this).serialize();
            $.ajax({
                url: '{{ route("reservaciones.actualizar", "") }}/' + reservacionId,
                method: 'PUT',
                data: formData,
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: response.success,
                        }).then(() => {
                            location.reload(); // Recarga la página
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
                        text: 'Ocurrió un error al actualizar la reservación.',
                    });
                }
            });
        });
    });
</script>
@endsection