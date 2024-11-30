<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\PersonasController;
use App\Http\Controllers\ReparacionesController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/registro', [RegisterController::class, 'index']);

Route::get('/dashboard', [AdministradorController::class, 'index'])->name('administrador.index');

Route::get('/dashboard/empleados', [EmpleadoController::class, 'index'])->name('empleados.index');
Route::get('/dashboard/clientes', [ClientesController::class, 'index'])->name('clientes.index');
Route::get('/dashboard/usuarios', [UsuariosController::class, 'index'])->name('usuarios.index');
Route::get('/dashboard/personas', [PersonasController::class, 'index'])->name('personas.index');
// // Ruta para Personas


// Rutas para reparaciones
Route::get('/reparaciones', [ReparacionesController::class, 'listar'])->name('reparaciones.listar');
Route::post('/reparaciones', [ReparacionesController::class, 'crear'])->name('reparaciones.crear');
Route::put('/reparaciones/{id}', [ReparacionesController::class, 'actualizar'])->name('reparaciones.actualizar');


require __DIR__.'/auth.php';


//rutas de reparaciones
