@extends('adminlte::page')
@section('content_header')
    <h1>Gestión de Clientes</h1>
@stop
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Listado de Clientes</h5>
                    <button type="button" class="btn btn-sm btn-primary shadow" data-toggle="modal" data-target="#nuevoClienteModal">
                        <i class="fas fa-plus-circle"></i> Agregar
                    </button>
                </div>
                <div class="card-body bg-light">
                    <div class="table-responsive">
                        <table id="clientes-table" class="table table-hover table-striped">
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
                                        <button type="button" class="btn btn-sm btn-warning shadow" data-toggle="modal" data-target="#editarClienteModal{{ $cliente['cod_persona'] }}">
                                            <i class="fas fa-edit"></i> Editar
                                        </button>
                                    </td>
                                </tr>
                                <!-- Modal de editar cliente -->
                                <div class="modal fade" id="editarClienteModal{{ $cliente['cod_persona'] }}" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header bg-warning text-dark">
                                                <h5 class="modal-title">Editar Cliente</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="editar-cliente-form" data-id="{{ $cliente['cod_persona'] }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="nombres">Nombres:</label>
                                                        <input type="text" class="form-control" name="nombres" value="{{ $cliente['nombres'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="apellidos">Apellidos:</label>
                                                        <input type="text" class="form-control" name="apellidos" value="{{ $cliente['apellidos'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="dni">DNI:</label>
                                                        <input type="text" class="form-control" name="dni" value="{{ $cliente['dni'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="telefono">Teléfono:</label>
                                                        <input type="text" class="form-control" name="telefono" value="{{ $cliente['telefono'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="direccion">Dirección:</label>
                                                        <input type="text" class="form-control" name="direccion" value="{{ $cliente['direccion'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                                                        <input type="date" class="form-control" name="fecha_nacimiento" value="{{ $cliente['fecha_nacimiento'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="estado_civil">Estado Civil:</label>
                                                        <input type="text" class="form-control" name="estado_civil" value="{{ $cliente['estado_civil'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="genero">Género:</label>
                                                        <input type="text" class="form-control" name="genero" value="{{ $cliente['genero'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nacionalidad">Nacionalidad:</label>
                                                        <input type="text" class="form-control" name="nacionalidad" value="{{ $cliente['nacionalidad'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="historial_compras">Historial de Compras:</label>
                                                        <input type="text" class="form-control" name="historial_compras" value="{{ $cliente['historial_compras'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="estado">Estado:</label>
                                                        <input type="text" class="form-control" name="estado" value="{{ $cliente['estado'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="edad">Edad:</label>
                                                        <input type="number" class="form-control" name="edad" value="{{ $cliente['edad'] }}" required>
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
                    <p>© Gestión de Clientes</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal de nuevo cliente -->
<div class="modal fade" id="nuevoClienteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Agregar Nuevo Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="nuevo-cliente-form">
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
                        <label for="historial_compras">Historial de Compras:</label>
                        <input type="text" class="form-control" name="historial_compras" required>
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado:</label>
                        <input type="text" class="form-control" name="estado" required>
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
        $('#clientes-table').DataTable({
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search": "Buscar:",
                "paginate": {
                    "first": "<button class='btn btn-sm btn-primary pagination-btn'>Primero</button>",
                    "last": "<button class='btn btn-sm btn-primary pagination-btn'>Último</button>",
                    "next": "<button class='btn btn-sm btn-primary pagination-btn'>Siguiente</button>",
                    "previous": "<button class='btn btn-sm btn-primary pagination-btn'>Anterior</button>"
                }
            },
            "dom": '<"top"f>rt<"bottom"p><"clear">',
            "pagingType": "simple",
            "stateSave": true
        });
    });
</script>
<style>
    .pagination-btn {
        margin-right: 10px; 
    }
</style>
@endsection