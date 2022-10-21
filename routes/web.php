<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HabitacionController;
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
// Rutas TipoHabitacion y Habitacion
Route::resource('tipoHabitaciones', TipoHabitacionController::class);
Route::resource('habitaciones', HabitacionController::class);
