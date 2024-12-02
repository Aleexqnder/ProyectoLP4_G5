@extends('adminlte::page')

@section('content_header')
    <h1>Gestión de Clientes</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Listado de Clientes</h5>
                    <button type="button" class="btn btn-sm btn-primary shadow" data-toggle="modal" data-target="#nuevoClienteModal">
                        <i class="fas fa-plus-circle"></i> Agregar
                    </button>
                </div>
                <div class="card-body bg-light">
                    <div class="table-responsive">
                        <table id="clientes-table" class="table table-hover table-dark">
                            <thead class="bg-green text-white">
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
                                    <th>Historial de Compras</th>
                                    <th>Fecha de registro</th>
                                    <th>Estado</th>
                                    <th>Edad</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clientes as $cliente)
                                <tr>
                                    <td>{{ $cliente["cod_persona"] }}</td>
                                    <td>{{ $cliente["nombres"] }}</td>
                                    <td>{{ $cliente["apellidos"] }}</td>
                                    <td>{{ $cliente["dni"] }}</td>
                                    <td>{{ $cliente["telefono"] }}</td>
                                    <td>{{ $cliente["direccion"] }}</td>
                                    <td>{{ $cliente["fecha_nacimiento"] }}</td>
                                    <td>{{ $cliente["estado_civil"] }}</td>
                                    <td>{{ $cliente["genero"] }}</td>
                                    <td>{{ $cliente["nacionalidad"] }}</td>
                                    <td>{{ $cliente["historial_compras"] }}</td>
                                    <td>{{ $cliente["fecha_registro"] }}</td>
                                    <td>{{ $cliente["estado"] }}</td>
                                    <td>{{ $cliente["edad"] }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning shadow editar-btn"
                                                data-toggle="modal"
                                                data-target="#editarClienteModal"
                                                data-id="{{ $cliente['cod_persona'] }}"
                                                data-cod_cliente="{{ $cliente['cod_cliente'] }}"
                                                data-nombres="{{ $cliente['nombres'] }}"
                                                data-apellidos="{{ $cliente['apellidos'] }}"
                                                data-dni="{{ $cliente['dni'] }}"
                                                data-telefono="{{ $cliente['telefono'] }}"
                                                data-direccion="{{ $cliente['direccion'] }}"
                                                data-fecha_nacimiento="{{ $cliente['fecha_nacimiento'] }}"
                                                data-estado_civil="{{ $cliente['estado_civil'] }}"
                                                data-genero="{{ $cliente['genero'] }}"
                                                data-nacionalidad="{{ $cliente['nacionalidad'] }}"
                                                data-historial_compras="{{ $cliente['historial_compras'] }}"
                                                data-estado="{{ $cliente['estado'] }}"
                                                data-edad="{{ $cliente['edad'] }}">
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
                    <p>© Gestión de Clientes</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de nuevo cliente -->
<div class="modal fade" id="nuevoClienteModal" tabindex="-1" role="dialog" aria-labelledby="nuevoClienteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="nuevoClienteModalLabel">Agregar Nuevo Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="nuevo-cliente-form" action="{{ route('clientes.crear') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="NOMBRES">Nombres:</label>
                            <input type="text" class="form-control" name="NOMBRES" id="NOMBRES" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="APELLIDOS">Apellidos:</label>
                            <input type="text" class="form-control" name="APELLIDOS" id="APELLIDOS" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="DNI">DNI:</label>
                            <input type="text" class="form-control" name="DNI" id="DNI" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="TELEFONO">Teléfono:</label>
                            <input type="text" class="form-control" name="TELEFONO" id="TELEFONO" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="DIRECCION">Dirección:</label>
                            <input type="text" class="form-control" name="DIRECCION" id="DIRECCION" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="FECHA_NACIMIENTO">Fecha de Nacimiento:</label>
                            <input type="date" class="form-control" name="FECHA_NACIMIENTO" id="FECHA_NACIMIENTO" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="ESTADO_CIVIL">Estado Civil:</label>
                            <input type="text" class="form-control" name="ESTADO_CIVIL" id="ESTADO_CIVIL" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="GENERO">Género:</label>
                            <select class="form-control" name="GENERO" id="GENERO" required>
                                <option value="" disabled selected>Seleccione Género</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="NACIONALIDAD">Nacionalidad:</label>
                            <input type="text" class="form-control" name="NACIONALIDAD" id="NACIONALIDAD" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="NOMBRE_USUARIO">Nombre de Usuario:</label>
                            <input type="text" class="form-control" name="NOMBRE_USUARIO" id="NOMBRE_USUARIO" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="CONTRASENA">Contraseña:</label>
                            <input type="password" class="form-control" name="CONTRASENA" id="CONTRASENA" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="EMAIL">Email:</label>
                            <input type="email" class="form-control" name="EMAIL" id="EMAIL" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="HISTORIAL_COMPRAS">Historial de Compras:</label>
                        <input type="text" class="form-control" name="HISTORIAL_COMPRAS" id="HISTORIAL_COMPRAS" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="FECHA_REGISTRO">Fecha de Registro:</label>
                            <input type="date" class="form-control" name="FECHA_REGISTRO" id="FECHA_REGISTRO" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="ESTADO">Estado:</label>
                            <select class="form-control" name="ESTADO" id="ESTADO" required>
                                <option value="" disabled selected>Seleccione Estado</option>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="EDAD">Edad:</label>
                            <input type="number" class="form-control" name="EDAD" id="EDAD" required>
                        </div>
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

<!-- Modal para editar cliente (único) -->
<div class="modal fade" id="editarClienteModal" tabindex="-1" role="dialog" aria-labelledby="editarClienteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning text-dark">
                <h5 class="modal-title" id="editarClienteModalLabel">Editar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editar-cliente-form" action="{{ route('clientes.actualizar', '') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="cod_cliente" id="cod_cliente">
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nombres">Nombres:</label>
                            <input type="text" class="form-control" name="nombres" id="nombres" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="apellidos">Apellidos:</label>
                            <input type="text" class="form-control" name="apellidos" id="apellidos" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="dni">DNI:</label>
                            <input type="text" class="form-control" name="dni" id="dni" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="telefono">Teléfono:</label>
                            <input type="text" class="form-control" name="telefono" id="telefono" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="direccion">Dirección:</label>
                            <input type="text" class="form-control" name="direccion" id="direccion" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                            <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="estado_civil">Estado Civil:</label>
                            <input type="text" class="form-control" name="estado_civil" id="estado_civil" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="genero">Género:</label>
                            <select class="form-control" name="genero" id="genero" required>
                                <option value="" disabled>Seleccione Género</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nacionalidad">Nacionalidad:</label>
                            <input type="text" class="form-control" name="nacionalidad" id="nacionalidad" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="historial_compras">Historial de Compras:</label>
                            <input type="text" class="form-control" name="historial_compras" id="historial_compras" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="estado">Estado:</label>
                            <select class="form-control" name="estado" id="estado" required>
                                <option value="" disabled>Seleccione Estado</option>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="edad">Edad:</label>
                            <input type="number" class="form-control" name="edad" id="edad" required>
                        </div>
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
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
     $(document).ready(function() {
        // Configuración de DataTable con Deferred Rendering
        $('#clientes-table').DataTable({
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
            stateSave: true,
            deferRender: true, // Mejora el rendimiento al renderizar filas de forma diferida
        });

        // Funciones AJAX
        // AJAX para agregar nuevo cliente
        $('#nuevo-cliente-form').on('submit', function(event) {
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                url: '{{ route("clientes.crear") }}',
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

        // AJAX para editar cliente
        $('#editar-cliente-form').on('submit', function(event) {
            event.preventDefault();
            var clienteId = $('#cod_cliente').val();
            var formData = $(this).serialize();
            $.ajax({
                url: '{{ route("clientes.actualizar", "") }}/' + clienteId,
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

        // Llenar el modal con los datos del cliente seleccionado
        $(document).on('click', '.editar-btn', function() {
            var button = $(this);
            $('#editarClienteModal #cod_cliente').val(button.data('cod_cliente'));
            $('#editarClienteModal #nombres').val(button.data('nombres'));
            $('#editarClienteModal #apellidos').val(button.data('apellidos'));
            $('#editarClienteModal #dni').val(button.data('dni'));
            $('#editarClienteModal #telefono').val(button.data('telefono'));
            $('#editarClienteModal #direccion').val(button.data('direccion'));
            $('#editarClienteModal #fecha_nacimiento').val(button.data('fecha_nacimiento'));
            $('#editarClienteModal #estado_civil').val(button.data('estado_civil'));
            $('#editarClienteModal #genero').val(button.data('genero'));
            $('#editarClienteModal #nacionalidad').val(button.data('nacionalidad'));
            $('#editarClienteModal #historial_compras').val(button.data('historial_compras'));
            $('#editarClienteModal #estado').val(button.data('estado'));
            $('#editarClienteModal #edad').val(button.data('edad'));
        });
    });
</script>

<style>
    .pagination-btn {
        margin-right: 10px; 
    }
</style>
@endsection