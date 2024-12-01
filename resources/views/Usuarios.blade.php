@extends('adminlte::page')
@section('title', 'Usuarios')

<!DOCTYPE html>
<html lang="en">
<head>

  </head>
<body>
@section('content_header')
<div class="container">
  <h2>Usuarios
      <button type ="Button" class="btn btn-primary" data-toggle="modal" data-target="#modal-insert-Usuario"> 
        Insertar
      </button>
  </h2>
    
@stop
@section('content')
<div class="container-fluid" style="width: 100%; height: 100%;">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class ="card-tittle">Listado de Usuarios </h3>
        </div>
        <div class="card-body">
          <div style="overflow-x: auto;">
          <table id="usuarios-table" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Cod Persona</th>
            <th>Nombre de Usuario</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Cod Usuario</th>
            <th>Contraseña</th>
            <th>Email</th>
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
        fetch('http://localhost:3000/Usuarios') // Asegúrate de usar la URL correcta
            .then(response => response.json())
            .then(data => {
                console.log('Administradores:', data);
                const tbody = document.querySelector('#usuarios-table tbody');
                tbody.innerHTML = ''; // Limpiar contenido previo

                data.forEach(infor => {
                    const tr = document.createElement('tr');

                    tr.innerHTML = `
                        <td>${infor.cod_persona}</td>
                        <td>${infor.nombres}</td>
                        <td>${infor.apellidos}</td>
                        <td>${infor.cod_usuario}</td>
                        <td>${infor.nombre_usuario}</td>
                        <td>${infor.contrasena}</td>
                        <td>${infor.Email}</td>
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