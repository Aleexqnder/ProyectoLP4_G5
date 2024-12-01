@extends('adminlte::page')
@section('content_header')
    <h1>Gestión de Empleados</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Listado de Empleados</h5>
                    <button type="button" class="btn btn-sm btn-primary shadow" data-toggle="modal" data-target="#nuevoEmpleadoModal">
                        <i class="fas fa-plus-circle"></i> Agregar
                    </button>
                </div>
                <div class="card-body bg-light">
                    <div class="table-responsive">
                        <table id="empleados-table" class="table table-hover table-striped">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>Codigo de persona</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>DNI</th>
                                    <th>Teléfono</th>
                                    <th>Direccion</th>
                                    <th>Fecha de Nacimiento</th>
                                    <th>Estado Civil</th>
                                    <th>Género</th>
                                    <th>Nacionalidad</th>
                                    <th>Salario</th>
                                    <th>Puesto</th>
                                    <th>Fecha de Contratación</th>
                                    <th>Edad</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($empleados as $empleado)
                                <tr>
                                    <td>{{ $empleado["cod_persona"] }}</td>
                                    <td>{{ $empleado["nombres"] }}</td>
                                    <td>{{ $empleado["apellidos"] }}</td>
                                    <td>{{ $empleado["dni"] }}</td>
                                    <td>{{ $empleado["telefono"] }}</td>
                                    <td>{{ $empleado["direccion"] }}</td>
                                    <td>{{ $empleado["fecha_nacimiento"] }}</td>
                                    <td>{{ $empleado["estado_civil"] }}</td>
                                    <td>{{ $empleado["genero"] }}</td>
                                    <td>{{ $empleado["nacionalidad"] }}</td>
                                    <td>{{ $empleado["salario"] }}</td>
                                    <td>{{ $empleado["puesto"] }}</td>
                                    <td>{{ $empleado["fecha_contratacion"] }}</td>
                                    <td>{{ $empleado["edad"] }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning shadow" data-toggle="modal" data-target="#editarEmpleadoModal{{ $empleado['cod_empleado'] }}">
                                            <i class="fas fa-edit"></i> Editar
                                        </button>
                                    </td>
                                </tr>
                                <!-- Modal para editar empleado -->
                                @foreach($empleados as $empleado)
                                <div class="modal fade" id="editarEmpleadoModal{{ $empleado['cod_persona'] }}" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header bg-warning text-dark">
                                                <h5 class="modal-title">Editar Empleado</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="editar-empleado-form" data-id="{{ $empleado['cod_persona'] }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="cod_empleado" value="{{ $empleado['cod_empleado'] }}">
                                                    <div class="form-group">
                                                        <label for="nombres">Nombres:</label>
                                                        <input type="text" class="form-control" name="nombres" value="{{ $empleado['nombres'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="apellidos">Apellidos:</label>
                                                        <input type="text" class="form-control" name="apellidos" value="{{ $empleado['apellidos'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="dni">DNI:</label>
                                                        <input type="text" class="form-control" name="dni" value="{{ $empleado['dni'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="telefono">Teléfono:</label>
                                                        <input type="text" class="form-control" name="telefono" value="{{ $empleado['telefono'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="direccion">Dirección:</label>
                                                        <input type="text" class="form-control" name="direccion" value="{{ $empleado['direccion'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                                                        <input type="date" class="form-control" name="fecha_nacimiento" value="{{ $empleado['fecha_nacimiento'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="estado_civil">Estado Civil:</label>
                                                        <input type="text" class="form-control" name="estado_civil" value="{{ $empleado['estado_civil'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="genero">Género:</label>
                                                        <input type="text" class="form-control" name="genero" value="{{ $empleado['genero'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nacionalidad">Nacionalidad:</label>
                                                        <input type="text" class="form-control" name="nacionalidad" value="{{ $empleado['nacionalidad'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="salario">Salario:</label>
                                                        <input type="number" class="form-control" name="salario" value="{{ $empleado['salario'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="puesto">Puesto:</label>
                                                        <input type="text" class="form-control" name="puesto" value="{{ $empleado['puesto'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fecha_contratacion">Fecha de Contratación:</label>
                                                        <input type="date" class="form-control" name="fecha_contratacion" value="{{ $empleado['fecha_contratacion'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="edad">Edad:</label>
                                                        <input type="number" class="form-control" name="edad" value="{{ $empleado['edad'] }}" required>
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-center bg-dark text-white">
                    <p>© Gestión de Empleados</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal para agregar nuevo empleado -->
<div class="modal fade" id="nuevoEmpleadoModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Agregar Nuevo Empleado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="nuevo-empleado-form">
                    @csrf
                    <div class="form-group">
                        <label for="nombres">Nombres:</label>
                        <input type="text" class="form-control" name="nombres" required>
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Apellidos:</label>
                        <input type="text" class="form-control" name="apellidos" required>
                    </div>
                    <div class="form-group">
                        <label for="dni">DNI:</label>
                        <input type="text" class="form-control" name="dni" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono:</label>
                        <input type="text" class="form-control" name="telefono" required>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección:</label>
                        <input type="text" class="form-control" name="direccion" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                        <input type="date" class="form-control" name="fecha_nacimiento" required>
                    </div>
                    <div class="form-group">
                        <label for="estado_civil">Estado Civil:</label>
                        <input type="text" class="form-control" name="estado_civil" required>
                    </div>
                    <div class="form-group">
                        <label for="genero">Género:</label>
                        <input type="text" class="form-control" name="genero" required>
                    </div>
                    <div class="form-group">
                        <label for="nacionalidad">Nacionalidad:</label>
                        <input type="text" class="form-control" name="nacionalidad" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre_usuario">Nombre de usuario:</label>
                        <input type="text" class="form-control" name="nombre_usuario" required>
                    </div>
                    <div class="form-group">
                        <label for="contrasena">Contraseña:</label>
                        <input type="password" class="form-control" name="contrasena" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="salario">Salario:</label>
                        <input type="number" class="form-control" name="salario" required>
                    </div>
                    <div class="form-group">
                        <label for="puesto">Puesto:</label>
                        <input type="text" class="form-control" name="puesto" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_contratacion">Fecha de Contratación:</label>
                        <input type="date" class="form-control" name="fecha_contratacion" required>
                    </div>
                    <div class="form-group">
                        <label for="edad">Edad:</label>
                        <input type="number" class="form-control" name="edad" required>
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
        $('#empleados-table').DataTable({
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
            dom: '<"top"f>rt<"bottom"p><"clear">',
            pagingType: "simple",
            stateSave: true
        });

        // Funciones AJAX
        // AJAX para agregar nuevo empleado
        $('#nuevo-empleado-form').on('submit', function(event) {
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                url: '{{ route("empleados.crear") }}',
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

        // AJAX para editar empleado
        $('.editar-empleado-form').on('submit', function(event) {
            event.preventDefault();
            var empleadoId = $(this).data('id');
            var formData = $(this).serialize();
            $.ajax({
                url: '{{ route("empleados.actualizar", "") }}/' + empleadoId,
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