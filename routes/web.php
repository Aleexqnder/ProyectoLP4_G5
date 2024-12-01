<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\ReparacionesController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\PersonasController;
use App\Http\Controllers\UsuariosController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/registro', [RegisterController::class, 'index']);
Route::get('/dashboard', [AdministradorController::class, 'index'])->name('dashboard.index');

// Rutas para clientes
route::get('/Clientes', [ClientesController::class, 'listar'])->name('clientes.listar');
route::post('/Clientes', [ClientesController::class, 'crear'])->name('clientes.crear');
route::put('/Clientes/{id}', [ClientesController::class, 'actualizar'])->name('clientes.actualizar');

//Rutas para empleados
route::get('/empleados', [EmpleadosController::class, 'listar'])->name('empleados.listar');
route::post('/empleados', [EmpleadosController::class, 'crear'])->name('empleados.crear');
route::put('/empleados/{id}', [EmpleadosController::class, 'actualizar'])->name('empleados.actualizar');


// Rutas para personas
Route::get('/personas', [PersonasController::class, 'listar'])->name('personas.listar');

// Rutas para usuarios
Route::get('/usuarios', [UsuariosController::class, 'listar'])->name('usuarios.listar');
Route::post('/usuarios', [UsuariosController::class, 'crear'])->name('usuarios.crear');
Route::put('/usuarios/{id}', [UsuariosController::class, 'actualizar'])->name('usuarios.actualizar');



// Rutas para reparaciones
Route::get('/reparaciones', [ReparacionesController::class, 'listar'])->name('reparaciones.listar');
Route::post('/reparaciones', [ReparacionesController::class, 'crear'])->name('reparaciones.crear');
Route::put('/reparaciones/{id}', [ReparacionesController::class, 'actualizar'])->name('reparaciones.actualizar');



require __DIR__.'/auth.php';