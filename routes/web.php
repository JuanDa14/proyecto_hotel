<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HabitacionController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TipoHabitacionController;
use App\Http\Controllers\UserController;
use App\Models\Reserva;
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

Route::resource('productos', ProductoController::class)->names('productos');
Route::resource('pedidos', PedidoController::class)->names('pedidos');

// Clientes
Route::resource('clientes', ClienteController::class);

//Reservas
Route::resource('reservas', ReservaController::class);
Route::get('reservas/imprimir/{id}', [ReservaController::class, 'imprimir'])->name('imprimir-reserva');

Route::get('grafico/', [DashboardController::class, 'grafico'])->name('grafico');

Route::get('reporte', [ReporteController::class, 'vista_reporte_fecha'])->name('ver_reporte_fecha');
Route::get('reporte/fecha/{a}/{m}', [ReporteController::class, 'reporte_fecha'])->name('reporte_fecha');
Route::post('imprimir/reserva', [ReporteController::class, 'imprimir_reserva'])->name('imprimir_reserva');

// Financiero
Route::get('/reporte/financiero', [ReporteController::class, 'vista_reporte_financiero'])->name('ver_reporte_financiero');
Route::get('reporte/financiero/{a}/{m}', [ReporteController::class, 'reporte_financiero'])->name('reporte_financiero');
Route::post('imprimir/financiero', [ReporteController::class, 'imprimir_financiero'])->name('imprimir_financiero');


Route::get('imprimir/pdf/guia', [ReporteController::class, 'imprimir_guia'])->name('imprimir_guia');


Route::get('guia', function () {
    return view('guias.guia_usuario');
});
