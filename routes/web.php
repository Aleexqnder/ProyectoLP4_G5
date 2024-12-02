<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\ReparacionesController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\PersonasController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\CotizacionesController;
use App\Http\Controllers\RegisterController;


// Definir la ruta para mostrar el formulario de registro
Route::get('/registro', [RegisterController::class, 'index'])->name('register.index');

// Definir la ruta para manejar la creación de un nuevo usuario
Route::post('/registro', [RegisterController::class, 'crear'])->name('register.crear');

// Otras rutas existentes...
Route::get('/dashboard', [AdministradorController::class, 'index'])->name('dashboard.index');

// Rutas para clientes
Route::get('/Clientes', [ClientesController::class, 'listar'])->name('clientes.listar');
Route::post('/Clientes', [ClientesController::class, 'crear'])->name('clientes.crear');
Route::put('/Clientes/{id}', [ClientesController::class, 'actualizar'])->name('clientes.actualizar');

// Rutas para empleados
Route::get('/empleados', [EmpleadosController::class, 'listar'])->name('empleados.listar');
Route::post('/empleados', [EmpleadosController::class, 'crear'])->name('empleados.crear');
Route::put('/empleados/{id}', [EmpleadosController::class, 'actualizar'])->name('empleados.actualizar');

// Rutas para personas
Route::get('/personas', [PersonasController::class, 'listar'])->name('personas.listar');

// Rutas para usuarios
Route::get('/usuarios', [UsuariosController::class, 'listar'])->name('usuarios.listar');
Route::post('/usuarios', [UsuariosController::class, 'crear'])->name('usuarios.crear');
Route::put('/usuarios/{id}', [UsuariosController::class, 'actualizar'])->name('usuarios.actualizar');

// Rutas para cotizaciones
Route::get('/cotizaciones', [CotizacionesController::class, 'listar'])->name('cotizaciones.listar');
Route::post('/cotizaciones', [CotizacionesController::class, 'crear'])->name('cotizaciones.crear');
Route::put('/cotizaciones/{id}', [CotizacionesController::class, 'actualizar'])->name('cotizaciones.actualizar');

// Rutas para reparaciones
Route::get('/reparaciones', [ReparacionesController::class, 'listar'])->name('reparaciones.listar');
Route::post('/reparaciones', [ReparacionesController::class, 'crear'])->name('reparaciones.crear');
Route::put('/reparaciones/{id}', [ReparacionesController::class, 'actualizar'])->name('reparaciones.actualizar');

require __DIR__.'/auth.php';