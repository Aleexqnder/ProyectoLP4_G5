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
                                    <th>Código Reporte</th>
                                    <th>Descripción</th>
                                    <th>Fecha Reporte</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reportes as $reporte)
                                <tr>
                                    <td>{{ $reporte["cod_reporte"] }}</td>
                                    <td>{{ $reporte["des_reporte"] }}</td>
                                    <td>{{ $reporte["fecha_reporte"] }}</td>
                                    <td>
            <!-- Botón de editar -->
            <button class="btn btn-warning btn-sm edit-button" 
                data-id="{{ $reporte['cod_reporte'] }}" 
                data-descripcion="{{ $reporte['des_reporte'] }}" 
                data-fecha="{{ $reporte['fecha_reporte'] }}" 
                data-toggle="modal" data-target="#EditarReportesModal">
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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#NuevoReportesModal">
                        <i class="fas fa-plus-circle"></i> Agregar Nuevo Reporte
                    </button>
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
        <label for="des_reporte">Descripción:</label>
        <input type="text" class="form-control" name="DES_REPORTE" required>
    </div>
    <div class="form-group">
        <label for="fecha_reporte">Fecha Reporte:</label>
        <input type="date" class="form-control" name="FECHA_REPORTE" required>
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
<!-- Modal de edición -->
<div class="modal fade" id="EditarReportesModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title">Editar Reporte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editar-reporte-form">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="COD_REPORTE" id="edit-cod-reporte">
                    <div class="form-group">
                        <label for="edit-des-reporte">Descripción:</label>
                        <input type="text" class="form-control" id="edit-des-reporte" name="DES_REPORTE" required>
                    </div>
                    <div class="form-group">
                        <label for="edit-fecha-reporte">Fecha Reporte:</label>
                        <input type="date" class="form-control" id="edit-fecha-reporte" name="FECHA_REPORTE" required>
                    </div>
                    <button type="submit" class="btn btn-warning btn-block">Actualizar</button>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        // AJAX para agregar nuevo reporte
        $('#nuevo-reporte-form').on('submit', function(event) {
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                url: '{{ route("reportes.store") }}',
                method: 'POST',
                data: formData,
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: response.message,
                    }).then(() => {
                        location.reload();
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: xhr.responseJSON ? xhr.responseJSON.error : 'Error desconocido.',
                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.edit-button').on('click', function() {
            const codReporte = $(this).data('id');
            const descripcion = $(this).data('descripcion');
            const fecha = $(this).data('fecha');

            $('#edit-cod-reporte').val(codReporte);
            $('#edit-des-reporte').val(descripcion);
            $('#edit-fecha-reporte').val(fecha);
        });

        // AJAX para editar reporte
        $('#editar-reporte-form').on('submit', function(event) {
            event.preventDefault();

            const codReporte = $('#edit-cod-reporte').val();
            const formData = $(this).serialize();

            $.ajax({
                url: `/reportes/${codReporte}`, // Ruta PUT
                method: 'PUT',
                data: formData,
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'Reporte actualizado correctamente.',
                    }).then(() => {
                        location.reload();
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: xhr.responseJSON ? xhr.responseJSON.error : 'Error desconocido.',
                    });
                }
            });
        });
    });
</script>

@endsection