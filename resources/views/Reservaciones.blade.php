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
                            <tbody id="reservaciones-tbody">
                                <!-- Se llenará dinámicamente con el lenguaje JavaScript -->
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
        // Cargar reservaciones con GET
        function cargarReservaciones() {
            $.ajax({
                url: '/reservaciones',
                method: 'GET',
                success: function(reservaciones) {
                    let tbody = '';
                    reservaciones.forEach(reservacion => {
                        tbody += `
                        <tr>
                            <td>${reservacion.cod_reservacion}</td>
                            <td>${reservacion.cod_persona}</td>
                            <td>${reservacion.cod_vehiculo}</td>
                            <td>${reservacion.fecha_reservacion}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-warning shadow editar-reservacion" data-id="${reservacion.cod_reservacion}" data-toggle="modal" data-target="#nuevaReservacionModal">
                                    <i class="fas fa-edit"></i> Editar
                                </button>
                            </td>
                        </tr>`;
                    });
                    $('#reservaciones-tbody').html(tbody);
                    $('#reservaciones-table').DataTable();
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'No se pudieron cargar las reservaciones.',
                    });
                }
            });
        }

        // Llamar a la función para cargar reservaciones
        cargarReservaciones();

        // Agregar nueva reservación con POST
        $('#nueva-reservacion-form').on('submit', function(event) {
            event.preventDefault();
            const formData = $(this).serialize();
            $.ajax({
                url: '/reservaciones',
                method: 'POST',
                data: formData,
                success: function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'Reservación agregada correctamente.',
                    }).then(() => {
                        $('#nuevaReservacionModal').modal('hide');
                        cargarReservaciones();
                    });
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'No se pudo agregar la reservación.',
                    });
                }
            });
        });

        // Editar reservación con PUT
        $(document).on('click', '.editar-reservacion', function() {
            const reservacionId = $(this).data('id');
            $.get(`/reservaciones/${reservacionId}`, function(reservacion) {
                $('input[name="cod_persona"]').val(reservacion.cod_persona);
                $('input[name="cod_vehiculo"]').val(reservacion.cod_vehiculo);
                $('input[name="fecha_reservacion"]').val(reservacion.fecha_reservacion);

                $('#nueva-reservacion-form').off('submit').on('submit', function(event) {
                    event.preventDefault();
                    const formData = $(this).serialize();
                    $.ajax({
                        url: `/reservaciones/${reservacionId}`,
                        method: 'PUT',
                        data: formData,
                        success: function() {
                            Swal.fire({
                                icon: 'success',
                                title: 'Éxito',
                                text: 'Reservación actualizada correctamente.',
                            }).then(() => {
                                $('#nuevaReservacionModal').modal('hide');
                                cargarReservaciones();
                            });
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'No se pudo actualizar la reservación.',
                            });
                        }
                    });
                });
            });
        });
    });
</script>
@endsection
