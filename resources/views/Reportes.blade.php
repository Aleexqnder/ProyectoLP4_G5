@extends('adminlte::page')

@section('content_header')
    <h1>Gestión de Reportes</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">Listado de Reportes</h5>
                </div>
                <div class="card-body bg-light">
                    <div class="table-responsive">
                        <table id="reportes-table" class="table table-hover table-striped">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>ID Reporte</th>
                                    <th>Código Reporte</th>
                                    <th>Descripción</th>
                                    <th>Fecha Reporte</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reportes as $reporte)
                                <tr>
                                    <td>{{ $reporte["cod_reporte"] }}</td>
                                    <td>{{ $reporte["des_reporte"] }}</td>
                                    <td>{{ $reporte["fecha_reporte"] }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning shadow" data-toggle="modal" data-target="#editarReportesModal{{ $reporte['cod_reporte'] }}">
                                            <i class="fas fa-edit"></i> Editar
                                        </button>
                                        <button type="button" class="btn btn-sm btn-primary shadow" data-toggle="modal" data-target="#NuevoReportesModal">
                                            <i class="fas fa-plus-circle"></i> Agregar
                                        </button>
                                    </td>
                                </tr>
                                <!-- Modal de editar reporte -->
                                <div class="modal fade" id="editarReportesModal{{ $reporte['cod_reporte'] }}" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header bg-warning text-dark">
                                                <h5 class="modal-title">Editar Reporte</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="editar-reporte-form" data-id="{{ $reporte['cod_reporte'] }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="cod_reporte">Código Reporte:</label>
                                                        <input type="text" class="form-control" name="cod_reporte" value="{{ $reporte['cod_reporte'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="des_reporte">Descripción Reporte:</label>
                                                        <input type="text" class="form-control" name="des_reporte" value="{{ $reporte['des_reporte'] }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fecha_reporte">Fecha Reporte:</label>
                                                        <input type="date" class="form-control" name="fecha_reporte" value="{{ $reporte['fecha_reporte'] }}" required>
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
                    <p>© Gestión de Reportes</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal de nuevo reporte -->
<div class="modal fade" id="NuevoReportesModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Agregar Nuevo Reporte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="nuevo-reporte-form">
                    @csrf
                    <div class="form-group">
                        <label for="cod_reporte">Código Reporte:</label>
                        <input type="text" class="form-control" name="cod_reporte" required>
                    </div>
                    <div class="form-group">
                        <label for="des_reporte">Descripción:</label>
                        <input type="text" class="form-control" name="des_reporte" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_reporte">Fecha Reparación:</label>
                        <input type="date" class="form-control" name="fecha_reporte" required>
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
        $('#reportes-table').DataTable({
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
        // AJAX para agregar nuevo reporte
        $('#nuevo-reporte-form').on('submit', function(event) {
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                url: '{{ route("reportes.crear") }}',
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
        // AJAX para editar reporte
        $('.editar-reporte-form').on('submit', function(event) {
            event.preventDefault();
            var reporteId = $(this).data('id');
            var formData = $(this).serialize();
            $.ajax({
                url: '{{ route("reportes.actualizar", "") }}/' + reporteId,
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