@extends('adminlte::page')
@section('title', 'Administrador')

<!DOCTYPE html>
<html lang="en">
<head>

  </head>
<body>
@section('content_header')
<div class="container">
  <h2>Administrador
      <button type ="Button" class="btn btn-primary" data-toggle="modal" data-target="#modal-insert-administrador"> 
        Insertar
      </button>
  </h2>
    
@stop
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class ="card-tittle">Listado de Empleados </h3>
        </div>
        <div class="card-body">
          <table id="empleados-table" class="table table-bordered table-striped">
          <thead>
            <tr>
                <th>Cod Persona</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>DNI</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Edad</th>
                <th>Fecha Nacimiento</th>
                <th>Estado Civil</th>
                <th>Género</th>
                <th>Nacionalidad</th>
                <th>Cod Empleado</th>
                <th>Fecha Contratación</th>
                <th>Salario</th>
                <th>Puesto</th>
                <th>Acciones</th>
            </tr>
        </thead>

            <tbody>
              
            </tbody>
          </table>
        </div>
      </div>  
    </div> 
  </div> 
</div>  
</div>

<!-- /.modal-Insert -->
<div class="modal fade" id="modal-insert-administrador">
    <div class="modal-dialog">
        <div class="modal-content bg-default">

            <div class="modal-header">
                <h4 class="modal-title">Insertar Datos</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{url('/Administrador')}}" method="POST">
            {{ csrf_field() }}
            <div class="modal-body">
              <div class="from-group">  
                      <label for=""> Codigo Administrador </label>
                      <input type="text" name="Cod_Administrador">
                      <br>
                      <label for=""> Cod_Tipo_Usuario </label>
                      <input type="text" name="Cod_Tipo_Usuario">
                      <br>
                      <label for=""> Nombre del Admin </label>
                      <input type="text" name="Nombre_Admin">
                      <br>
                      <label for=""> Usuario </label>
                      <input type="text" name="Usr_Registro"> 
                      <br>
              </div>
            </div>
          

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-primary">Guardar</button>
            </div>
         </from>
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@stop

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        fetchAdministradores();
    });

    function fetchAdministradores() {
        fetch('http://localhost:3000/Clientes') // Asegúrate de usar la URL correcta
            .then(response => response.json())
            .then(data => {
                console.log('Administradores:', data);
                const tbody = document.querySelector('#empleados-table tbody');
                tbody.innerHTML = ''; // Limpiar contenido previo

                data.forEach(infor => {
                    const tr = document.createElement('tr');

                    tr.innerHTML = `
                        <td>${infor.cod_persona}</td>
                        <td>${infor.nombres}</td>
                        <td>${infor.apellidos}</td>
                        <td>${infor.dni}</td>
                        <td>${infor.telefono}</td>
                        <td>${infor.direccion}</td>
                        <td>${infor.edad}</td>
                        <td>${formatDate(infor.fecha_nacimiento)}</td>
                        <td>${infor.estado_civil}</td>
                        <td>${infor.genero}</td>
                        <td>${infor.nacionalidad}</td>
                        <td>${infor.cod_empleado}</td>
                        <td>${formatDate(infor.fecha_contratacion)}</td>
                        <td>${infor.salario}</td>
                        <td>${infor.puesto}</td>
                        <td>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-update-reportes-${infor.cod_persona}">
                                Editar
                            </button>
                            <form action="/administrador/destroy/${infor.cod_persona}" method="POST" style="display:inline-block;">
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
                console.error('Error al obtener los administradores:', error);
            });
    }

    // Función para formatear fechas (opcional)
    function formatDate(dateString) {
        const options = { year: 'numeric', month: 'short', day: 'numeric' };
        return new Date(dateString).toLocaleDateString(undefined, options);
    }
</script>
@stop

</body>
</html>