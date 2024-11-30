@extends('adminlte::page')
@section('title', 'Administrador')

<!DOCTYPE html>
<html lang="en">
<head>

  </head>
<body>
@section('content_header')
<div class="container">
    Empleados
    <button type="Button" class="btn btn-primary" data-toggle="modal" data-target="#modal-insert-administrador"> 
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
          <h3 class ="card-tittle">Listado de Empleados </h3>
        </div>
        <div class="card-body">
        <div style="overflow-x: auto;">
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
<div class="modal-dialog" role="document">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h5 class="modal-title" id="modalInsertEmpleadoLabel">Insertar Empleado</h5>
            </div>
            <form id="insert-empleado-form">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="salario">Salario</label>
                        <input type="number" name="salario" id="salario" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="puesto">Puesto</label>
                        <input type="text" name="puesto" id="puesto" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="nombres">Nombres</label>
                        <input type="text" name="nombres" id="nombres" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" name="apellidos" id="apellidos" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="text" name="dni" id="dni" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="text" name="telefono" id="telefono" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" name="direccion" id="direccion" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="estado_civil">Estado Civil</label>
                        <input type="text" name="estado_civil" id="estado_civil" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="genero">Género</label>
                        <input type="text" name="genero" id="genero" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="nacionalidad">Nacionalidad</label>
                        <input type="text" name="nacionalidad" id="nacionalidad" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre_usuario">Nombre de Usuario</label>
                        <input type="text" name="nombre_usuario" id="nombre_usuario" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="contrasena">Contraseña</label>
                        <input type="password" name="contrasena" id="contrasena" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_contratacion">Fecha de Contratación</label>
                        <input type="date" name="fecha_contratacion" id="fecha_contratacion" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="edad">Edad</label>
                        <input type="number" name="edad" id="edad" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-update">
<div class="modal-dialog" role="document">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h5 class="modal-title" id="modalInsertEmpleadoLabel">Insertar Empleado</h5>
            </div>
            <form id="insert-empleado-form">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="salario">Salario</label>
                        <input type="number" name="salario" id="salario" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="puesto">Puesto</label>
                        <input type="text" name="puesto" id="puesto" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="nombres">Nombres</label>
                        <input type="text" name="nombres" id="nombres" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" name="apellidos" id="apellidos" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="text" name="dni" id="dni" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="text" name="telefono" id="telefono" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" name="direccion" id="direccion" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="estado_civil">Estado Civil</label>
                        <input type="text" name="estado_civil" id="estado_civil" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="genero">Género</label>
                        <input type="text" name="genero" id="genero" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="nacionalidad">Nacionalidad</label>
                        <input type="text" name="nacionalidad" id="nacionalidad" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre_usuario">Nombre de Usuario</label>
                        <input type="text" name="nombre_usuario" id="nombre_usuario" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="contrasena">Contraseña</label>
                        <input type="password" name="contrasena" id="contrasena" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_contratacion">Fecha de Contratación</label>
                        <input type="date" name="fecha_contratacion" id="fecha_contratacion" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="edad">Edad</label>
                        <input type="number" name="edad" id="edad" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
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
      fetchEmpleados();
    });

    const borrarEmpleado = (id) => {
      const row = document.getElementById(id);
      row.innerHTML = '';
    }

    function fetchEmpleados() {
        fetch('http://localhost:3000/Empleados') // Asegúrate de usar la URL correcta
            .then(response => response.json())
            .then(data => {
                const tbody = document.getElementById('empleados-table');
                if (!tbody) {
                    return;
                }
                tbody.innerHTML = ''; // Limpiar contenido previo

                data.forEach(infor => {
                    const tr = document.createElement('tr');
                    tr.id = "row-user-" + infor.cod_empleado

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
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-update">
                                Editar
                            </button>
                            <button type="submit" class="btn btn-danger" onclick="borrarEmpleado('${tr.id}')">Borrar</button>
                        </td>
                    `;
                    
                    tbody.appendChild(tr);
                });

                data.forEach(infor => {
                    const form = document.getElementById(`update-empleado`);
                    if(form){
                        form.addEventListener('submit', function(e) {
                            e.preventDefault();

                            const data = {
                                "salario": parseInt(document.getElementById('salario').value, 10),
                                "puesto": document.getElementById('puesto').value,
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
                                "fecha_contratacion": document.getElementById('fecha_contratacion').value,
                                "edad": parseInt(document.getElementById('edad').value, 10)
                            };

                            fetch(`http://localhost:3000/Empleados/${infor.cod_empleado}`, {
                                method: "PUT",
                                headers: {
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify(data),
                            })
                            .then(response => {
                                if (response.ok) {
                                    alert('Empleado actualizado exitosamente');
                                    var modalEl = document.getElementById(`modal-update-${infor.cod_empleado}`);
                                    var modal = bootstrap.Modal.getInstance(modalEl);
                                    modal.hide();
                                    fetchEmpleados();
                                } else {
                                    return response.json().then(err => { throw err; });
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                alert('Ocurrió un error al actualizar el empleado.');
                            });
                        });
                    }
                });
            })
            .catch(error => {
                console.error('Error al obtener los administradores:', error);
            })
            .finally(() => {
                // Ocultar
                const modal = document.getElementById('modal-insert-administrador');
                if (modal) {
                    modal.style.display = 'none';
                }

            });
    }

    function formatDate(dateString) {
        const options = { year: 'numeric', month: 'short', day: 'numeric' };
        return new Date(dateString).toLocaleDateString(undefined, options);
    }

    document.getElementById('insert-empleado-form').addEventListener('submit', function(e) {
        const data = {
            "salario": parseInt(document.getElementById('salario').value, 10),
            "puesto": document.getElementById('puesto').value,
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
            "fecha_contratacion": document.getElementById('fecha_contratacion').value,
            "edad": parseInt(document.getElementById('edad').value, 10)
        };

        fetch('http://localhost:3000/Empleados', {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data),
        })
        .then(response => {
            if (response.ok) {
                alert('Empleado registrado exitosamente');
                fetchEmpleados();
                document.getElementById('insert-empleado-form').reset(); // Resetear el formulario
            } else {
                return response.json().then(err => { throw err; });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Ocurrió un error al registrar el empleado.');
        });
    });
</script>
@stop

</body>
</html>