<!-- resources/views/Personas.blade.php -->

@extends('adminlte::page')

@section('title', 'Listado de Personas')

@section('content_header')
<div class="container">
    <h2>Listado de Personas
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-insert-persona"> 
            Insertar
        </button>
    </h2>
</div>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado de Personas</h3>
                </div>
                <div class="card-body">
                    <table id="personas-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Cod Persona</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>DNI</th>
                                <th>Teléfono</th>
                                <th>Dirección</th>
                                <th>Edad</th>
                                <th>Fecha de Nacimiento</th>
                                <th>Estado Civil</th>
                                <th>Género</th>
                                <th>Nacionalidad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Las filas se llenarán dinámicamente con JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>  
        </div> 
    </div> 
</div>  
</div>

<!-- Modal Insertar Persona -->
<div class="modal fade" id="modal-insert-persona">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Insertar Persona</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/personas') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">  
                        <label for="cod_persona">Código Persona</label>
                        <input type="number" name="cod_persona" id="cod_persona" class="form-control" required>
                        
                        <label for="nombres">Nombres</label>
                        <input type="text" name="nombres" id="nombres" class="form-control" required>
                        
                        <label for="apellidos">Apellidos</label>
                        <input type="text" name="apellidos" id="apellidos" class="form-control" required>
                        
                        <label for="dni">DNI</label>
                        <input type="text" name="dni" id="dni" class="form-control" required>
                        
                        <label for="telefono">Teléfono</label>
                        <input type="text" name="telefono" id="telefono" class="form-control" required>
                        
                        <label for="direccion">Dirección</label>
                        <input type="text" name="direccion" id="direccion" class="form-control" required>
                        
                        <label for="edad">Edad</label>
                        <input type="number" name="edad" id="edad" class="form-control" required>
                        
                        <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" required>
                        
                        <label for="estado_civil">Estado Civil</label>
                        <input type="text" name="estado_civil" id="estado_civil" class="form-control" required>
                        
                        <label for="genero">Género</label>
                        <input type="text" name="genero" id="genero" class="form-control" required>
                        
                        <label for="nacionalidad">Nacionalidad</label>
                        <input type="text" name="nacionalidad" id="nacionalidad" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        fetchPersonas();
    });

    function fetchPersonas() {
        fetch('http://localhost:3000/Personas') // Reemplaza con la URL correcta de tu API
            .then(response => response.json())
            .then(data => {
                const tbody = document.querySelector('#personas-table tbody');
                tbody.innerHTML = ''; // Limpiar contenido previo

                data.forEach(persona => {
                    const tr = document.createElement('tr');

                    tr.innerHTML = `
                        <td>${persona.cod_persona}</td>
                        <td>${persona.nombres}</td>
                        <td>${persona.apellidos}</td>
                        <td>${persona.dni}</td>
                        <td>${persona.telefono}</td>
                        <td>${persona.direccion}</td>
                        <td>${persona.edad}</td>
                        <td>${formatDate(persona.fecha_nacimiento)}</td>
                        <td>${persona.estado_civil}</td>
                        <td>${persona.genero}</td>
                        <td>${persona.nacionalidad}</td>
                        <td>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-update-persona-${persona.cod_persona}">
                                Editar
                            </button>
                            <form action="/personas/destroy/${persona.cod_persona}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Borrar</button>
                            </form>
                        </td>
                    `;
                    
                    tbody.appendChild(tr);
                });
            })
            .catch(error => {
                console.error('Error al obtener las personas:', error);
                alert('Hubo un problema al cargar las personas. Por favor, intenta nuevamente.');
            });
    }

    // Función para formatear fechas (opcional)
    function formatDate(dateString) {
        const options = { year: 'numeric', month: 'short', day: 'numeric' };
        return new Date(dateString).toLocaleDateString(undefined, options);
    }
</script>
@stop