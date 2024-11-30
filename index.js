/*

Universidad Nacional de Honduras

Integrantes: 

- 20211020997 Jasson Alexander Suazo Molina
- 20191004421 Carlos Francisco Reyes López
- 20221001412 Yenifer Michell Fuentes Servellón
- 20201003997 André Alessandro Lagos Cano
- 20191002726 Edwin Alexander Mejía Molina
- 20211001469 Kevin David Miguel Ávila


Clase: Lenguaje de Programación IV

Periodo: III PAC 2024

Catedrático: Lester Fiallos

*/

import mysql from 'mysql';
import express from 'express';
import bodyParser from 'body-parser';
import dotenv from 'dotenv';

dotenv.config();

const app = express();

// Set CORS headers Access-Control-Allow-Origin: *

app.use((req, res, next) => {
    res.setHeader('Access-Control-Allow-Origin', '*');
    next();
});

app.use(bodyParser.json());

const mysqlConnection = mysql.createConnection({
    host: process.env.DB_HOST,
    user: process.env.DB_USERNAME,
    password: process.env.DB_PASSWORD,
    database: process.env.DB_DATABASE,
    multipleStatements: true,
    port: process.env.DB_PORT
});

mysqlConnection.connect((err) => {
    if (!err) {
        console.log('Conexión exitosa a la base de datos.');
    } else {
        console.log('Error al conectarse a la base de datos.');
    }
});

app.listen(3000, () => console.log('Servidor corriendo en el puerto 3000.'));



// Cierre del bloque general de las conexiones.

// API'S

//                                 20211020997 Jasson Alexander Suazo Molina

// GET personas
app.get('/personas', (req, res) => {
    mysqlConnection.query('CALL SEL_PERSONAS()', (err, rows) => {
        if (!err) {
            res.status(200).json(rows[0]); 
        } else {
            console.log(err);
            res.status(500).send('Error al obtener la lista de personas');
        }
    });
});

// GET empleados
app.get('/empleados', (req, res) => {
    mysqlConnection.query('CALL SEL_EMPLEADOS()', (err, rows) => {
        if (!err) {
            res.status(200).json(rows[0]); 
        } else {
            console.log(err);
            res.status(500).send('Error al obtener la lista de empleados');
        }
    });
});

// GET clientes
app.get('/clientes', (req, res) => {
    mysqlConnection.query('CALL SEL_CLIENTES()', (err, rows) => {
        if (!err) {
            res.status(200).json(rows[0]); // Retorna todos los clientes
        } else {
            console.log(err);
            res.status(500).send('Error al obtener la lista de clientes');
        }
    });
});

// GET usuarios
app.get('/usuarios', (req, res) => {
    mysqlConnection.query('CALL SEL_USUARIOS()', (err, rows) => {
        if (!err) {
            res.status(200).json(rows[0]); // Retorna todos los usuarios
        } else {
            console.log(err);
            res.status(500).send('Error al obtener la lista de usuarios');
        }
    });
});


// POST a la tabla "Clientes"
app.post('/clientes', (req, res) => {
    const cliente = req.body;

    const sqlquery = `
        CALL INS_PERSONA_CLIENTE(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);
    `;
    
    mysqlConnection.query(sqlquery, [
        cliente.NOMBRES,
        cliente.APELLIDOS,
        cliente.DNI,
        cliente.TELEFONO,
        cliente.DIRECCION,
        cliente.FECHA_NACIMIENTO,
        cliente.ESTADO_CIVIL,
        cliente.GENERO,
        cliente.NACIONALIDAD,
        cliente.NOMBRE_USUARIO,
        cliente.CONTRASENA,
        cliente.EMAIL,
        cliente.HISTORIAL_COMPRAS,
        cliente.FECHA_REGISTRO,
        cliente.ESTADO,
        cliente.EDAD  
    ], (err) => {
        if (!err) {
            res.status(201).send("Cliente ingresado correctamente.");
        } else {
            console.log(err);
            res.status(500).send('Error al ingresar el cliente');
        }
    });
});


// POST a la tabla USUARIOS - EMPLEADOS

app.post('/usuariosEMP', (req, res) => {
    const usuarioEmpleado = req.body;

    const sqlquery = `
        CALL INS_USUARIO_EMPLEADO(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);
    `;

    mysqlConnection.query(sqlquery, [
        usuarioEmpleado.NOMBRES,
        usuarioEmpleado.APELLIDOS,
        usuarioEmpleado.DNI,
        usuarioEmpleado.TELEFONO,
        usuarioEmpleado.DIRECCION,
        usuarioEmpleado.FECHA_NACIMIENTO,
        usuarioEmpleado.ESTADO_CIVIL,
        usuarioEmpleado.GENERO,
        usuarioEmpleado.NACIONALIDAD,
        usuarioEmpleado.EDAD,
        usuarioEmpleado.NOMBRE_USUARIO,
        usuarioEmpleado.CONTRASENA,
        usuarioEmpleado.EMAIL,
        usuarioEmpleado.PUESTO,
        usuarioEmpleado.SALARIO,
        usuarioEmpleado.FECHA_CONTRATACION
    ], (err) => {
        if (!err) {
            res.status(201).send("Usuario y empleado ingresados correctamente.");
        } else {
            console.log(err);
            res.status(500).send('Error al ingresar el usuario y el empleado');
        }
    });
});


// POST A LA TABLA USUARIOS - CLIENTES

app.post('/UsuariosCLS', (req, res) => {
    const usuario = req.body;

    const sqlquery = `
        CALL INS_USUARIO_CLIENTE(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);
    `;
    
    mysqlConnection.query(sqlquery, [
        usuario.NOMBRES,
        usuario.APELLIDOS,
        usuario.DNI,
        usuario.TELEFONO,
        usuario.DIRECCION,
        usuario.FECHA_NACIMIENTO,
        usuario.ESTADO_CIVIL,
        usuario.GENERO,
        usuario.NACIONALIDAD,
        usuario.EDAD,
        usuario.NOMBRE_USUARIO,
        usuario.CONTRASENA,
        usuario.EMAIL
    ], (err) => {
        if (!err) {
            res.status(201).send("Usuario registrado correctamente.");
        } else {
            console.log(err);
            res.status(500).send('Error al registrar el usuario');
        }
    });
});



// POST a la tabla "Empleados"
app.post('/empleados', (req, res) => {
    const empleado = req.body;
    const sqlquery = `
        CALL INS_PERSONA_EMPLEADO(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);
    `;
    mysqlConnection.query(sqlquery, [
        empleado.NOMBRES,
        empleado.APELLIDOS,
        empleado.DNI,
        empleado.TELEFONO,
        empleado.DIRECCION,
        empleado.FECHA_NACIMIENTO,
        empleado.ESTADO_CIVIL,
        empleado.GENERO,
        empleado.NACIONALIDAD,
        empleado.NOMBRE_USUARIO,
        empleado.CONTRASENA,
        empleado.EMAIL,
        empleado.SALARIO,
        empleado.PUESTO,
        empleado.FECHA_CONTRATACION,
        empleado.EDAD 
    ], (err) => {
        if (!err) {
            res.status(201).send("Empleado ingresado correctamente.");
        } else {
            console.log(err);
            res.status(500).send('Error al ingresar el empleado');
        }
    });
});


// PUT a la tabla "Usuarios"

app.put('/usuarios/:cod_usuario', (req, res) => {
    const { cod_usuario } = req.params; 
    const { nombre_usuario, contrasena, email } = req.body; 

    if (!nombre_usuario || !contrasena || !email) {
        return res.status(400).send('Todos los campos son requeridos');
    }

    const sqlquery = `
        CALL UPD_USUARIO(?, ?, ?, ?);
    `;

    mysqlConnection.query(sqlquery, [cod_usuario, nombre_usuario, contrasena, email], (err, results) => {
        if (err) {
            console.error(err);
            return res.status(500).send('Error al actualizar el usuario');
        }
        res.status(200).send('Usuario actualizado correctamente');
    });
});


// PUT a la tabla "Clientes"
app.put('/clientes/:id', (req, res) => {
    const cod_persona = req.params.id;
    const cliente = req.body;

    const sqlquery = `
        CALL UPD_CLIENTE(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);
    `;
    mysqlConnection.query(sqlquery, [
        cod_persona,
        cliente.nombres, 
        cliente.apellidos,
        cliente.dni,
        cliente.telefono,
        cliente.direccion,
        cliente.fecha_nacimiento,
        cliente.estado_civil,
        cliente.genero,
        cliente.nacionalidad,
        cliente.nombre_usuario,
        cliente.contrasena,
        cliente.email,
        cliente.historial_compras,
        cliente.estado,
        cliente.edad
    ], (err) => {
        if (!err) {
            res.status(200).send("Cliente actualizado correctamente.");
        } else {
            console.log(err);
            res.status(500).send('Error al actualizar el cliente');
        }
    });
});


// PUT a la tabla "Empleados"
app.put('/empleados/:id', (req, res) => {
    const cod_empleado = req.params.id;
    const empleado = req.body;
    const sqlquery = `
        CALL UPD_EMPLEADO(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);
    `;
    mysqlConnection.query(sqlquery, [
        cod_empleado,
        empleado.salario,           
        empleado.puesto,           
        empleado.nombres,
        empleado.apellidos,
        empleado.dni,
        empleado.telefono,
        empleado.direccion,
        empleado.fecha_nacimiento,
        empleado.estado_civil,
        empleado.genero,
        empleado.nacionalidad,
        empleado.nombre_usuario,
        empleado.contrasena,
        empleado.email,
        empleado.fecha_contratacion,  
        empleado.edad
    ], (err) => {
        if (!err) {
            res.status(200).send("Empleado actualizado correctamente.");
        } else {
            console.log(err);
            res.status(500).send('Error al actualizar el empleado');
        }
    });
});


//                                  20191002726 Edwin Alexander Mejía Molina


// GET de cotizaciones
app.get('/cotizaciones', (req, res) => {
    mysqlConnection.query('CALL SEL_COTIZACION(NULL)', (err, rows) => {
        if (!err) {
            res.status(200).json(rows[0]); 
        } else {
            console.log(err);
            res.status(500).send('Error al obtener la lista de cotizaciones');
        }
    });
});


// POST a la tabla "Cotizaciones"
app.post('/cotizaciones', (req, res) => {
    const cotizacion = req.body; 

    console.log("Cotización recibida:", cotizacion); 

    const sqlquery = `
        CALL INS_COTIZACION(?, ?, ?, ?, ?, ?, ?, ?, ?);
    `;

    mysqlConnection.query(sqlquery, [
        cotizacion.cod_persona,
        cotizacion.fecha,
        cotizacion.descripcion,
        cotizacion.monto,
        cotizacion.cod_cliente,
        cotizacion.cod_empleado,
        cotizacion.cantidad,
        cotizacion.tipo_producto,
        cotizacion.estado_producto
    ], (err, result) => {
        if (err) {
            console.error("Error al insertar la cotización:", err); // 
            res.status(500).send('Error al insertar la cotización');
        } else {
            console.log("Resultado de la inserción:", result); //
            res.status(200).send("Cotización insertada correctamente.");
        }
    });
});


// PUT a la tabla "Cotizaciones"
app.put('/cotizaciones/:id', (req, res) => {
    const cod_cotizacion = req.params.id;
    const cotizacion = req.body; 

    const sqlquery = `
        CALL UPD_COTIZACION(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);
    `;

    mysqlConnection.query(sqlquery, [
        cod_cotizacion,
        cotizacion.cod_persona,
        cotizacion.fecha,
        cotizacion.cod_detalle,
        cotizacion.descripcion,
        cotizacion.monto,
        cotizacion.cod_cliente,
        cotizacion.cod_empleado,
        cotizacion.cantidad,
        cotizacion.tipo_producto,
        cotizacion.estado_producto
    ], (err) => {
        if (err) {
            console.error("Error al actualizar la cotización:", err); // Muestra el error si ocurre
            res.status(500).send('Error al actualizar la cotización');
        } else {
            console.log("Cotización actualizada correctamente"); // Muestra el éxito de la operación
            res.status(200).send("Cotización actualizada correctamente.");
        }
    });
});


//                                  20211001469 Kevin David Miguel Ávila
//                                  20201003997 André Alessandro Lagos Cano

// GET reservaciones
app.get('/reservaciones', (req, res) => {
    mysqlConnection.query('CALL SEL_TODAS_RESERVACIONES()', (err, rows) => {
        if (!err) {
            res.status(200).json(rows[0]);
        } else {
            console.log(err);
            res.status(500).send('Error al obtener la lista de reservaciones');
        }
    });
});


//POTS a la tabla “reservaciones”
app.post('/reservaciones', (req, res) => {
    const reservacion = req.body;
    const sqlquery = `
      CALL INS_RESERVACIONES(?, ?, ?);
    `;
    mysqlConnection.query(sqlquery, [
      reservacion.cod_persona,
      reservacion.cod_vehiculo,
      reservacion.fecha_reservacion
    ], (err) => {
      if (!err) {
        res.status(201).send("Reservación ingresada correctamente.");
      } else {
        console.log(err);
        res.status(500).send('Error al ingresar la reservación');
      }
    });
  });
  

// PUT a la tabla “reservaciones”
app.put('/reservaciones/:id', (req, res) => {
    const cod_reservacion = req.params.id;  
    const reservaciones = req.body;        
    const sqlquery = `
        CALL UPD_RESERVACIONES(?, ?, ?, ?); 
    `;

    mysqlConnection.query(sqlquery, [
        cod_reservacion,  
        reservaciones.cod_persona,
        reservaciones.cod_vehiculo, 
        reservaciones.fecha_reservacion, 
    ], (err) => {
        if (!err) {
            res.status(200).send("Reservación actualizada correctamente.");
        } else {
            console.log(err);
            res.status(500).send('Error al actualizar la reservación');
        }
    });
});


//                                  20221001412 Yenifer Michell Fuentes Servellón


app.get('/reportes', (req, res) => {
    const sqlQuery = 'CALL SEL_TODOS_REPORTES()';
    mysqlConnection.query(sqlQuery, (err, results) => {
        if (!err) {
            res.status(200).json(results[0]);
        } else {
            console.log(err);
            res.status(500).send('Error al obtener la lista de reportes');
        }
    });
});

  
  
  app.post('/reportes', (req, res) => {
    const reportes = req.body;
    const sqlquery = `
        CALL INS_REPORTES(?, ?);
    `;
    mysqlConnection.query(sqlquery, [
        reportes.DES_REPORTE,
        reportes.FECHA_REPORTE
    ],  (err) => {
        if (!err) {
            res.status(201).send("Reporte ingresado correctamente.");
        } else {
            console.log(err);
            res.status(500).send('Error al ingresar el reporte');
        }
    });
  });
  
  app.put('/reportes/:id', (req, res) => {
    const cod_reporte = req.params.id;
    const reportes = req.body;

    const sqlquery = `
        CALL UPD_REPORTES(?, ?, ?);
    `;

    mysqlConnection.query(sqlquery, [
        reportes.DES_REPORTE,  
        reportes.FECHA_REPORTE, 
        cod_reporte           
    ], (err) => {
        if (!err) {
            res.status(200).send("Reporte actualizado correctamente.");
        } else {
            console.log(err);
            res.status(500).send('Error al actualizar el reporte');
        }
    });
});


//                                 20191004421-Carlos Francisco Reyes Lopez

//APIS Reparaciones
// GET reparacion
app.get('/REPARACIONES', (req, res) => {
    mysqlConnection.query('CALL SEL_REPARACION()', (err, rows, fields) => {
        if (!err) {
            res.status(200).json({
                message: 'Reparaciones obtenidas correctamente.',
                data: rows[0]
            });
        } else {
            console.log(err);
            res.status(500).json({
                message: 'Error al obtener las reparaciones.',
                error: err
            });
        }
    });
});

// POST reparaciones
app.post('/REPARACIONES', (req, res) => {
    const { cod_vehiculo, descripcion, fecha_reparacion, costo } = req.body;

    mysqlConnection.query(
        "CALL INS_REPARACION(?, ?, ?, ?)",
        [cod_vehiculo, descripcion, fecha_reparacion, costo],
        (err, rows, fields) => {
            if (!err) {
                res.status(201).json({
                    message: 'Reparación ingresada correctamente.',
                    data: rows[0], // Opcional: devuelve el resultado si lo necesitas
                });
            } else {
                console.error('Error al ingresar la reparación:', err);
                res.status(500).json({
                    message: 'Error al ingresar la reparación.',
                    error: err.sqlMessage || err.message,
                });
            }
        }
    );
});

// PUT Reparaciones
app.put('/REPARACIONES', (req, res) => {
    const { cod_reparacion, cod_vehiculo, descripcion, fecha_reparacion, costo } = req.body;

    mysqlConnection.query("CALL UPD_REPARACION (?,?,?,?,?)", [
        cod_reparacion, cod_vehiculo, descripcion, fecha_reparacion, costo
    ], (err, rows, fields) => {
        if (!err) {
            res.status(200).json({
                message: 'Reparación actualizada correctamente.'
            });
        } else {
            console.log(err);
            res.status(500).json({
                message: 'Error al actualizar la reparación.',
                error: err
            });
        }
    });
});


//APIS Vehiculos
//GET vehiculo
app.get('/VEHICULOS', (req, res) => {
    mysqlConnection.query('CALL SEL_VEHICULOS()', (err, rows, fields) => {
        if (!err) {
            res.status(200).json({
                message: 'Vehículos obtenidos correctamente.',
                data: rows[0]
            });
        } else {
            console.log(err);
            res.status(500).json({
                message: 'Error al obtener los vehículos.',
                error: err
            });
        }
    });
});

//POST vehiculo
app.post('/VEHICULOS', (req, res) => {
    const { cod_persona, marca, modelo, año } = req.body;

    mysqlConnection.query("CALL INS_VEHICULO (?,?,?,?)", [
        cod_persona, marca, modelo, año
    ], (err, rows, fields) => {
        if (!err) {
            res.status(201).json({
                message: 'Vehículo ingresado correctamente.'
            });
        } else {
            console.log(err);
            res.status(500).json({
                message: 'Error al ingresar el vehículo.',
                error: err
            });
        }
    });
});


//PUT vehiculo
app.put('/VEHICULOS', (req, res) => {
    const { cod_vehiculo, cod_persona, marca, modelo, año } = req.body;

    mysqlConnection.query("CALL UPD_VEHICULO (?,?,?,?,?)", [
        cod_vehiculo, cod_persona, marca, modelo, año
    ], (err, rows, fields) => {
        if (!err) {
            res.status(200).json({
                message: 'Vehículo actualizado correctamente.'
            });
        } else {
            console.log(err);
            res.status(500).json({
                message: 'Error al actualizar el vehículo.',
                error: err
            });
        }
    });
});


//Fin APIS Reparaciones y Vehiculos