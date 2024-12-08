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
                                    <th>ID Res…
[11:12 p.m., 7/12/2024] Miguel(prog4): @extends('adminlte::page')

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
                    <button type="button" class="btn btn-sm btn-primary shadow agregar-reservacion" data-toggle="modal" data-target="#nuevaReservacionModal">
                        <i class="fas fa-plus-circle"></i> Agregar
                    </button>
                    <button type="button" class="btn btn-sm btn-danger shadow eliminar-reservacion" data-toggle="modal" data-target="#eliminarReservacionModal">
                        <i class="fas fa-trash"></i> Eliminar
                    </button>
                    <button type="button" class="btn btn-sm btn-warning shadow editar-reservacion" data-id="" data-toggle="modal" data-target="#editarReservacionModal">
                        <i class="fas fa-edit"></i> Editar
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
                            <tbody id="reservaciones-tbody">
                                @foreach($reservaciones as $reservacion)
                                <tr>
                                    <td>{{ $reservacion->cod_reservacion }}</td>
                                    <td>{{ $reservacion->cod_persona }}</td>
                                    <td>{{ $reservacion->cod_vehiculo }}</td>
                                    <td>{{ \Carbon\Carbon::parse($reservacion->fecha_reservacion)->format('Y-m-d') }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning shadow editar-reservacion" data-id="{{ $reservacion->cod_reservacion }}" data-toggle="modal" data-target="#editarReservacionModal">
                                            <i class="fas fa-edit"></i> Editar
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger shadow eliminar-reservacion" data-id="{{ $reservacion->cod_reservacion }}">
                                            <i class="fas fa-trash"></i> Eliminar
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-center bg-dark text-white">
                    <p> &copy; Gestión de Reservaciones</p>
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

<!-- Modal de eliminar reservación -->
<div class="modal fade" id="eliminarReservacionModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Eliminar Reservación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de que deseas eliminar la reserva?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmarEliminacionReservacionModal">Eliminar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de confirmación de eliminación de reservación -->
<div class="modal fade" id="confirmarEliminacionReservacionModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Confirmar Eliminación de Reservación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de que deseas eliminar la reserva?</p>
 …
[11:21 p.m., 7/12/2024] Miguel(prog4): @extends('adminlte::page')

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
                    <button type="button" class="btn btn-sm btn-primary shadow agregar-reservacion" data-toggle="modal" data-target="#nuevaReservacionModal">
                        <i class="fas fa-plus-circle"></i> Agregar
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
                            <tbody id="reservaciones-tbody">
                                @foreach($reservaciones as $reservacion)
                                <tr>
                                    <td>{{ $reservacion->cod_reservacion }}</td>
                                    <td>{{ $reservacion->cod_persona }}</td>
                                    <td>{{ $reservacion->cod_vehiculo }}</td>
                                    <td>{{ \Carbon\Carbon::parse($reservacion->fecha_reservacion)->format('Y-m-d') }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning shadow editar-reservacion" data-id="{{ $reservacion->cod_reservacion }}" data-toggle="modal" data-target="#editarReservacionModal">
                                            <i class="fas fa-edit"></i> Editar
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-center bg-dark text-white">
                    <p> &copy; Gestión de Reservaciones</p>
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

<!-- Modal de editar reservación -->
<div class="modal fade" id="editarReservacionModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Editar Reservación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editar-reservacion-form">
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
                            <td>${new Date(reservacion.fecha_reservacion).toISOString().split('T')[0]}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-warning shadow editar-reservacion" data-id="${reservacion.cod_reservacion}" data-toggle="modal" data-target="#editarReservacionModal">
                                    <i class="fas fa-edit"></i> Editar
                                </button>
                            </td>
                        </tr>`;
                    });
                    $('#reservaciones-tbody').html(tbody);
                    $('#reservaciones-table').DataTable();
                },
                error: function(xhr, status, error) {
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
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'No se pudo agregar la reservación.',
                    });
                }
            });
        });
    });
</script>

@endsection