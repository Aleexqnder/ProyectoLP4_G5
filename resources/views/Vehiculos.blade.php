@extends('adminlte::page')

@section('content_header')
    <h1>Gestión de Vehiculos</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">Listado de Vehiculos</h5>
                </div>
                <div class="card-body bg-light">
                    <div class="table-responsive">
                        <table id="vehiculos-table" class="table table-hover table-striped">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>ID Vehiculo</th>
                                    <th>Código Persona</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Año</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vehiculos as $vehiculo)
                                <tr>
                                    <td>{{ $vehiculo["cod_vehiculo"] }}</td>
                                    <td>{{ $vehiculo["cod_persona"] }}</td>
                                    <td>{{ $vehiculo["marca"] }}</td>
                                    <td>{{ $vehiculo["modelo"] }}</td>
                                    <td>{{ $vehiculo["año"] }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning shadow" data-toggle="modal" data-target="#editarVehiculoModal{{ $vehiculo['cod_vehiculo'] }}">
                                            <i class="fas fa-edit"></i> Editar
                                        </button>
                                        <button type="button" class="btn btn-sm btn-primary shadow" data-toggle="modal" data-target="#nuevoVehiculoModal">
                                            <i class="fas fa-plus-circle"></i> Agregar
                                        </button>
                                    </td>
                                </tr>

                                <!-- Modal de editar vehiculo -->
                                <div class="modal fade" id="editarVehiculoModal{{ $vehiculo['cod_vehiculo'] }}" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header bg-warning text-dark">
                                                <h5 class="modal-title">Editar Vehiculo</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="editar-vehiculo-form" data-id="{{ $vehiculo['cod_vehiculo'] }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="cod_persona">Código Persona:</label>
                                                        <input type="text" class="form-control" name="cod_persona" value="{{ $vehiculo['cod_persona'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="marca">Marca:</label>
                                                        <input type="text" class="form-control" name="marca" value="{{ $vehiculo['marca'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="modelo">Modelo:</label>
                                                        <input type="text" class="form-control" name="modelo" value="{{ $vehiculo['modelo'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="año">Año:</label>
                                                        <input type="number" class="form-control" name="año" value="{{ $vehiculo['año'] }}" required>
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
                    <p>© Gestión de Vehiculos</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de nuevo vehiculo -->
<div class="modal fade" id="nuevoVehiculoModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Agregar Nuevo Vehiculo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="nuevo-vehiculo-form">
                    @csrf
                    <div class="form-group">
                         <label for="cod_persona">Código Persona:</label>
                         <input type="text" class="form-control" name="cod_persona" value="{{ $vehiculo['cod_persona'] }}" required>
                    </div>
                    <div class="form-group">
                        <label for="marca">Marca:</label>
                        <input type="text" class="form-control" name="marca" value="{{ $vehiculo['marca'] }}" required>
                    </div>
                    <div class="form-group">
                        <label for="modelo">Modelo:</label>
                        <input type="text" class="form-control" name="modelo" value="{{ $vehiculo['modelo'] }}" required>
                    </div>
                    <div class="form-group">
                        <label for="año">Año:</label>
                        <input type="number" class="form-control" name="año" value="{{ $vehiculo['año'] }}" required>
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
        $('#vehiculos-table').DataTable({
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
        // AJAX para agregar nuevo vehiculo
        $('#nuevo-vehiculo-form').on('submit', function(event) {
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                url: '{{ route("vehiculos.crear") }}',
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
        // AJAX para editar vehiculo
        $('.editar-vehiculo-form').on('submit', function(event) {
            event.preventDefault();
            var vehiculoId = $(this).data('id');
            var formData = $(this).serialize();
            $.ajax({
                url: '{{ route("vehiculos.actualizar", "") }}/' + vehiculoId,
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
