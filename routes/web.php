<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\ReparacionesController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ReservacionesController;
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

// Rutas para reparaciones
Route::get('/reparaciones', [ReparacionesController::class, 'listar'])->name('reparaciones.listar');
Route::post('/reparaciones', [ReparacionesController::class, 'crear'])->name('reparaciones.crear');
Route::put('/reparaciones/{id}', [ReparacionesController::class, 'actualizar'])->name('reparaciones.actualizar');

// Rutas para reservaciones
Route::get('/reservaciones', [ReservacionesController::class, 'listar'])->name('reservaciones.listar');
Route::post('/reservaciones', [ReservacionesController::class, 'crear'])->name('reservaciones.crear');
Route::put('/reservaciones/{id}', [ReservacionesController::class, 'actualizar'])->name('reservaciones.actualizar');


require __DIR__.'/auth.php';