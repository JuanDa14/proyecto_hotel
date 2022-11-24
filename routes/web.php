<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HabitacionController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TipoHabitacionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/profile', function () {
    return view('profile.show');
});

Route::resource('user', UserController::class);
Route::get('deletevendedor/{id}', [UserController::class, 'inhabilitar'])->name('inhabilitar');
// Rutas TipoHabitacion y Habitacion / Servicios
Route::resource('tipoHabitaciones', TipoHabitacionController::class);
Route::resource('habitaciones', HabitacionController::class);
Route::resource('servicios', ServiceController::class);
// Proveedores
Route::resource('proveedores', ProveedorController::class);
Route::get('proveedores/disable/{id}', [ProveedorController::class, 'inhabilitar'])->name('inhabilitar-proveedor');
Route::get('proveedores/enable/{id}', [ProveedorController::class, 'habilitar'])->name('habilitar-proveedor');

// Clientes
Route::resource('clientes', ClienteController::class);

//Reservas
Route::resource('reservas', ReservaController::class);
Route::get('reservas/imprimir/{id}', [ReservaController::class, 'imprimir'])->name('imprimir-reserva');
