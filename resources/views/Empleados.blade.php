@extends('adminlte::page')

@section('content_header')
    <h1>Gestión de Empleados</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Listado de Empleados</h5>
                    <button type="button" class="btn btn-sm btn-primary shadow" data-toggle="modal" data-target="#nuevoEmpleadoModal">
                        <i class="fas fa-plus-circle"></i> Agregar
                    </button>
                </div>
                <div class="card-body bg-light">
                    <div class="table-responsive">
                        <table id="empleados-table" class="table table-hover table-dark">
                            <thead class="bg-success text-white">
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
                                        <button type="button" class="btn btn-sm btn-warning shadow editar-btn" data-toggle="modal" data-target="#editarEmpleadoModal" data-id="{{ $empleado['cod_empleado'] }}" data-nombres="{{ $empleado['nombres'] }}" data-apellidos="{{ $empleado['apellidos'] }}" data-dni="{{ $empleado['dni'] }}" data-telefono="{{ $empleado['telefono'] }}" data-direccion="{{ $empleado['direccion'] }}" data-fecha_nacimiento="{{ $empleado['fecha_nacimiento'] }}" data-estado_civil="{{ $empleado['estado_civil'] }}" data-genero="{{ $empleado['genero'] }}" data-nacionalidad="{{ $empleado['nacionalidad'] }}" data-salario="{{ $empleado['salario'] }}" data-puesto="{{ $empleado['puesto'] }}" data-fecha_contratacion="{{ $empleado['fecha_contratacion'] }}" data-edad="{{ $empleado['edad'] }}">
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
                    <p>© Gestión de Empleados</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal para editar empleado -->
<div class="modal fade" id="editarEmpleadoModal" tabindex="-1" role="dialog" aria-labelledby="editarEmpleadoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning text-dark">
                <h5 class="modal-title" id="editarEmpleadoModalLabel">Editar Empleado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editar-empleado-form">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="cod_empleado" id="cod_empleado">
                    <input type="hidden" name="cod_persona" id="cod_persona">
                    <div class="form-group">
                        <label for="nombres">Nombres:</label>
                        <input type="text" class="form-control" name="nombres" id="nombres" required>
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Apellidos:</label>
                        <input type="text" class="form-control" name="apellidos" id="apellidos" required>
                    </div>
                    <div class="form-group">
                        <label for="dni">DNI:</label>
                        <input type="text" class="form-control" name="dni" id="dni" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono:</label>
                        <input type="text" class="form-control" name="telefono" id="telefono" required>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección:</label>
                        <input type="text" class="form-control" name="direccion" id="direccion" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                        <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" required>
                    </div>
                    <div class="form-group">
                        <label for="estado_civil">Estado Civil:</label>
                        <input type="text" class="form-control" name="estado_civil" id="estado_civil" required>
                    </div>
                    <div class="form-group">
                        <label for="genero_editar">Género:</label>
                        <select class="form-control" name="genero" id="genero_editar" required>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nacionalidad">Nacionalidad:</label>
                        <input type="text" class="form-control" name="nacionalidad" id="nacionalidad" required>
                    </div>
                    <div class="form-group">
                        <label for="salario">Salario:</label>
                        <input type="number" class="form-control" name="salario" id="salario" required>
                    </div>
                    <div class="form-group">
                        <label for="puesto_editar">Puesto:</label>
                        <select class="form-control" name="puesto" id="puesto_editar" required>
                            <option value="">Selecciona un puesto</option>
                            <option value="Mecánico">Mecánico</option>
                            <option value="Supervisor">Supervisor</option>
                            <option value="Técnico">Técnico</option>
                            <option value="Recepcionista">Recepcionista</option>
                            <option value="Gerente">Gerente</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fecha_contratacion">Fecha de Contratación:</label>
                        <input type="date" class="form-control" name="fecha_contratacion" id="fecha_contratacion" required>
                    </div>
                    <div class="form-group">
                        <label for="edad">Edad:</label>
                        <input type="number" class="form-control" name="edad" id="edad" required>
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

<!-- Modal para agregar nuevo empleado -->
<div class="modal fade" id="nuevoEmpleadoModal" tabindex="-1" role="dialog" aria-labelledby="nuevoEmpleadoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="nuevoEmpleadoModalLabel">Agregar Nuevo Empleado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="nuevo-empleado-form">
                    @csrf
                    <div class="form-group">
                        <label for="nombres_nuevo">Nombres:</label>
                        <input type="text" class="form-control" name="nombres" id="nombres_nuevo" required>
                    </div>
                    <div class="form-group">
                        <label for="apellidos_nuevo">Apellidos:</label>
                        <input type="text" class="form-control" name="apellidos" id="apellidos_nuevo" required>
                    </div>
                    <div class="form-group">
                        <label for="dni_nuevo">DNI:</label>
                        <input type="text" class="form-control" name="dni" id="dni_nuevo" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono_nuevo">Teléfono:</label>
                        <input type="text" class="form-control" name="telefono" id="telefono_nuevo" required>
                    </div>
                    <div class="form-group">
                        <label for="direccion_nuevo">Dirección:</label>
                        <input type="text" class="form-control" name="direccion" id="direccion_nuevo" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_nacimiento_nuevo">Fecha de Nacimiento:</label>
                        <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento_nuevo" required>
                    </div>
                    <div class="form-group">
                        <label for="estado_civil_nuevo">Estado Civil:</label>
                        <input type="text" class="form-control" name="estado_civil" id="estado_civil_nuevo" required>
                    </div>
                    <div class="form-group">
                        <label for="genero_nuevo">Género:</label>
                        <select class="form-control" name="genero" id="genero_nuevo" required>
                            <option value="">Selecciona Género</option>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nacionalidad_nuevo">Nacionalidad:</label>
                        <input type="text" class="form-control" name="nacionalidad" id="nacionalidad_nuevo" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre_usuario_nuevo">Nombre de usuario:</label>
                        <input type="text" class="form-control" name="nombre_usuario" id="nombre_usuario_nuevo" required>
                    </div>
                    <div class="form-group">
                        <label for="contrasena_nuevo">Contraseña:</label>
                        <input type="password" class="form-control" name="contrasena" id="contrasena_nuevo" required>
                    </div>
                    <div class="form-group">
                        <label for="email_nuevo">Email:</label>
                        <input type="email" class="form-control" name="email" id="email_nuevo" required>
                    </div>
                    <div class="form-group">
                        <label for="salario_nuevo">Salario:</label>
                        <input type="number" class="form-control" name="salario" id="salario_nuevo" required>
                    </div>
                    <div class="form-group">
                        <label for="puesto_nuevo">Puesto:</label>
                        <select class="form-control" name="puesto" id="puesto_nuevo" required>
                            <option value="">Selecciona un puesto</option>
                            <option value="Mecánico">Mecánico</option>
                            <option value="Supervisor">Supervisor</option>
                            <option value="Técnico">Técnico</option>
                            <option value="Recepcionista">Recepcionista</option>
                            <option value="Gerente">Gerente</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fecha_contratacion_nuevo">Fecha de Contratación:</label>
                        <input type="date" class="form-control" name="fecha_contratacion" id="fecha_contratacion_nuevo" required>
                    </div>
                    <div class="form-group">
                        <label for="edad_nuevo">Edad:</label>
                        <input type="number" class="form-control" name="edad" id="edad_nuevo" required>
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
<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        // Inicializar Select2 en los campos de puesto
        $('#puesto_editar, #puesto_nuevo').select2({
            theme: 'bootstrap4',
            placeholder: "Selecciona un puesto",
            allowClear: true
        });

        // Inicializar Select2 en los campos de género
        $('#genero_editar, #genero_nuevo').select2({
            theme: 'bootstrap4',
            placeholder: "Selecciona Género",
            allowClear: true
        });

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
        $('#editar-empleado-form').on('submit', function(event) {
            event.preventDefault();
            var empleadoId = $('#cod_persona').val();
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

        // Llenar el modal de edición con los datos del empleado seleccionado
        $(document).on('click', '.editar-btn', function() {
            var button = $(this);
            $('#editarEmpleadoModal #cod_empleado').val(button.data('id'));
            $('#editarEmpleadoModal #cod_persona').val(button.data('id'));
            $('#editarEmpleadoModal #nombres').val(button.data('nombres'));
            $('#editarEmpleadoModal #apellidos').val(button.data('apellidos'));
            $('#editarEmpleadoModal #dni').val(button.data('dni'));
            $('#editarEmpleadoModal #telefono').val(button.data('telefono'));
            $('#editarEmpleadoModal #direccion').val(button.data('direccion'));
            $('#editarEmpleadoModal #fecha_nacimiento').val(button.data('fecha_nacimiento'));
            $('#editarEmpleadoModal #estado_civil').val(button.data('estado_civil'));
            $('#editarEmpleadoModal #genero_editar').val(button.data('genero')).trigger('change');
            $('#editarEmpleadoModal #nacionalidad').val(button.data('nacionalidad'));
            $('#editarEmpleadoModal #salario').val(button.data('salario'));
            $('#editarEmpleadoModal #puesto_editar').val(button.data('puesto')).trigger('change');
            $('#editarEmpleadoModal #fecha_contratacion').val(button.data('fecha_contratacion'));
            $('#editarEmpleadoModal #edad').val(button.data('edad'));
        });
    });
</script>

<style>
    .pagination-btn {
        margin-right: 10px; 
    }

    /* Ajustes para Select2 con Bootstrap */
    .select2-container--bootstrap4 .select2-selection {
        height: calc(1.5em + .75rem + 2px);
        padding: .375rem .75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: .25rem;
    }
</style>
@endsection