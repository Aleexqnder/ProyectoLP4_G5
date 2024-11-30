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
           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-insert-cliente">
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
          <h3 class ="card-tittle">Listado de Clientes </h3>
        </div>
        <div class="card-body">
        <div style="overflow-x: auto;">
        <table id="Clientes-table" class="table table-bordered table-striped">
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
                <th>Cod Cliente</th>
                <th>Historial de Compras</th>
                <th>Fecha de Registro</th>
                <th>Estado</th>
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
<div class="modal fade" id="modal-insert-cliente" tabindex="-1" role="dialog" aria-labelledby="modalInsertClienteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h5 class="modal-title" id="modalInsertClienteLabel">Insertar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="insert-cliente-form">
                <div class="modal-body">
                    <!-- Campos del formulario -->
                    <div class="form-group">
                        <label for="nombres">Nombre</label>
                        <input type="text" name="NOMBRES" id="NOMBRES" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Apellido</label>
                        <input type="text" name="APELLIDOS" id="APELLIDOS" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="text" name="DNI" id="DNI" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="text" name="TELEFONO" id="TELEFONO" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" name="DIRECCION" id="DIRECCION" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="edad">Fecha de Nacimiento</label>
                        <input type="date" name="FECHA_NACIMIENTO" id="FECHA_NACIMIENTO" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="estado_civil">Estado Civil</label>
                        <input type="text" name="ESTADO_CIVIL" id="ESTADO_CIVIL" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="genero">Género</label>
                        <input type="text" name="GENERO" id="GENERO" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="nacionalidad">Nacionalidad</label>
                        <input type="text" name="NACIONALIDAD" id="NACIONALIDAD" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="nombre_usuario">Nombre de usuario</label>
                      <input type="text" name="NOMBRE_USUARIO" id="NOMBRE_USUARIO" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="contraseña">Contraseña</label>
                      <input type="password" name="CONTRASENA" id="CONTRASENA" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" name="EMAIL" id="EMAIL" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="historial_compras">Historial de Compras</label>
                        <input type="text" name="HISTORIAL_COMPRAS" id="HISTORIAL_COMPRAS" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="fecha_registro">Fecha de Registro</label>
                        <input type="date" name="FECHA_REGISTRO" id="FECHA_REGISTRO" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <input type="text" name="ESTADO" id="ESTADO" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="edad">Edad</label>
                        <input type="number" name="EDAD" id="EDAD" class="form-control" required>
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
@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        fetchClientes();
    });

    // Función para obtener y mostrar los clientes
    function fetchClientes() {
        fetch('http://localhost:3000/Clientes')
            .then(response => response.json())
            .then(data => {
                const tbody = document.querySelector('#Clientes-table tbody');
                tbody.innerHTML = ''; // Limpiar contenido previo

                data.forEach(cliente => {
                    const tr = document.createElement('tr');
                    tr.id = "row-user-" + cliente.cod_cliente;

                    tr.innerHTML = `
                        <td>${cliente.COD_PERSONA}</td>
                        <td>${cliente.NOMBRES}</td>
                        <td>${cliente.APELLIDOS}</td>
                        <td>${cliente.DNI}</td>
                        <td>${cliente.TELEFONO}</td>
                        <td>${cliente.DIRECCION}</td>
                        <td>${formatDate(cliente.FECHA_NACIMIENTO)}</td>
                        <td>${cliente.ESTADO_CIVIL}</td>
                        <td>${cliente.GENERO}</td>
                        <td>${cliente.NACIONALIDAD}</td>
                        <td>${cliente.cod_cliente}</td>
                        <td>${cliente.historial_compras}</td>
                        <td>${formatDate(cliente.fecha_registro)}</td>
                        <td>${cliente.estado}</td>
                        <td>${cliente.edad}</td>
                        <td>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-update-${cliente.cod_persona}">
                                Editar
                            </button>
                            <button type="button" class="btn btn-danger" onclick="borrarCliente('${cliente.cod_cliente}')">Borrar</button>
                        </td>
                    `;
                    tbody.appendChild(tr);
                });
            })
            .catch(error => {
                console.error('Error al obtener los clientes:', error);
            });
    }

    // Función para formatear fechas
    function formatDate(dateString) {
        const options = { year: 'numeric', month: 'short', day: 'numeric' };
        return new Date(dateString).toLocaleDateString(undefined, options);
    }

    // Manejar el envío del formulario de inserción
    document.getElementById('insert-cliente-form').addEventListener('submit', function(e) {
        e.preventDefault();

        const data = {
            "nombres": document.getElementById('nombres').value,
            "apellidos": document.getElementById('apellidos').value,
            "dni": document.getElementById('dni').value,
            "telefono": document.getElementById('telefono').value,
            "direccion": document.getElementById('direccion').value,
            "fecha_nacimiento": document.getElementById('fecha_nacimiento').value,
            "estado_civil": document.getElementById('estado_civil').value,
            "genero": document.getElementById('genero').value,
            "nacionalidad": document.getElementById('nacionalidad').value,
            "nombre_usuario": document.getElementById('nombre_usuario').value,
            "contrasena": document.getElementById('contrasena').value,
            "email": document.getElementById('email').value,
            "historial_compras": document.getElementById('historial_compras').value,
            "estado": document.getElementById('estado').value,
            "edad": parseInt(document.getElementById('edad').value, 10),
            "fecha_registro": document.getElementById('fecha_registro').value
        };

        console.log('Datos a enviar:', data);
        fetch('http://localhost:3000/Clientes', {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data),
        })
        .then(response => {
            if (response.ok) {
                alert('Cliente registrado exitosamente');
                $('#modal-insert-cliente').modal('hide');
                fetchClientes();
                document.getElementById('insert-cliente-form').reset(); // Resetear el formulario
            } else {
                return response.json().then(err => { throw err; });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Ocurrió un error al registrar el cliente.');
        });
    });

    // Función para borrar un cliente (necesita implementación en el backend)
    const borrarCliente = (cod_cliente) => {
        if (!confirm('¿Estás seguro de que deseas eliminar este cliente?')) {
            return;
        }

        // Aquí deberías implementar la lógica para eliminar el cliente en el backend.
        // Si no tienes una API para eliminar, considera usar formularios Laravel como se muestra más adelante.

        // Ejemplo usando una API DELETE (si estuviera disponible)
        /*
        fetch(`http://localhost:3000/Clientes/${cod_cliente}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json'
                // Agrega otros headers si es necesario
            }
        })
        .then(response => {
            if (response.ok) {
                // Eliminar la fila de la tabla
                const row = document.getElementById('row-user-' + cod_cliente);
                if (row) {
                    row.remove();
                }
                alert('Cliente eliminado exitosamente.');
            } else {
                alert('Error al eliminar el cliente.');
            }
        })
        .catch(error => {
            console.error('Error al eliminar el cliente:', error);
            alert('Ocurrió un error al eliminar el cliente.');
        });
        */

        // Si no tienes una API, solo eliminar la fila de la tabla
        const row = document.getElementById('row-user-' + cod_cliente);
        if (row) {
            row.remove();
            alert('Cliente eliminado de la vista, pero no de la base de datos.');
        }
    }
</script>
@endsection
@stop        
</body>
</html>