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
                                    <th>Codigo de Usuario</th>
                                    <th>Codigo de Persona</th>
                                    <th>Nombre de Usuario</th>
                                    <th>Contraseña</th>
                                    <th>Email</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($usuarios as $usuario)
                                <tr>
                                    <td>{{ $usuario["cod_usuario"] }}</td>
                                    <td>{{ $usuario["cod_persona"] }}</td>
                                    <td>{{ $usuario["nombre_usuario"] }}</td>
                                    <td>{{ $usuario["contrasena"] }}</td>
                                    <td>{{ $usuario["email"] }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning shadow" data-toggle="modal" data-target="#editarUsuarioModal{{ $usuario['cod_usuario'] }}">
                                            <i class="fas fa-edit"></i> Editar
                                        </button>
                                    </td>
                                </tr>
                                <!-- Modal para editar usuario -->
                                <div class="modal fade" id="editarUsuarioModal{{ $usuario['cod_usuario'] }}" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header bg-warning text-dark">
                                                <h5 class="modal-title">Editar Usuario</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="editar-usuario-form" data-id="{{ $usuario['cod_usuario'] }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="nombre_usuario">Nombre de Usuario:</label>
                                                        <input type="text" class="form-control" name="nombre_usuario" value="{{ $usuario['nombre_usuario'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="contrasena">Contraseña:</label>
                                                        <input type="password" class="form-control" name="contrasena" value="{{ $usuario['contrasena'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Email:</label>
                                                        <input type="email" class="form-control" name="email" value="{{ $usuario['email'] }}" required>
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
                    <p>© Gestión de Usuarios</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal para agregar nuevo usuario -->
<div class="modal fade" id="nuevoUsuarioModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Agregar Nuevo Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="nuevo-usuario-form">
                    @csrf
                    <div class="form-group">
                        <label for="cod_persona">Código de Persona:</label>
                        <input type="text" class="form-control" name="cod_persona" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre_usuario">Nombre de Usuario:</label>
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