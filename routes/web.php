<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ImpuestoController;
use App\Http\Controllers\InsumoController;
use App\Http\Controllers\OrdenCompraController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::resource('departamentos', DepartamentoController::class)->names('departamentos');
Route::resource('productos', ProductoController::class)->names('productos');
Route::resource('empleados', EmpleadoController::class)->names('empleados');
Route::resource('ventas', VentaController::class)->names('ventas');
Route::resource('insumos', InsumoController::class)->names('insumos');
Route::resource('impuestos', ImpuestoController::class)->names('impuestos');
Route::resource('ordencompras', OrdenCompraController::class)->names('ordencompras');
Route::get('/vistaImpuestos', [ImpuestoController::class, 'Vistareporte'])->name('vistaReporte');
Route::get('/validar/compra/{id}', [OrdenCompraController::class, 'validar'])->name('validar');
Route::get('cancelar/compra/{id}', [OrdenCompraController::class, 'cancelar'])->name('cancelar');
Route::get('imprimir/ordenCompra/{idcompra}', [OrdenCompraController::class, 'imprimir'])->name('imprimirOrdenCompra');
Route::post('/registrar/cliente', [VentaController::class, 'registrarCliente'])->name('registrarCliente');
Route::get('/grafico/ventas/mes', [VentaController::class, 'graficoVentasMes'])->name('graficoVentasMes');
Route::get('/reporteImpuesto/{A}', [ImpuestoController::class, 'reporte'])->name('reporteImpuesto');
Route::get('/imprimirImpuesto/{idimpuesto}', [ImpuestoController::class, 'imprimir'])->name('imprimirImpuesto');

Route::get('imprimir/{idventa}', [VentaController::class, 'imprimir'])->name('imprimir');

Route::post('pdfReporteMensual', [VentaController::class, 'imprimirReporte'])->name('imprimirRM');

route::get('/descuentos', [VentaController::class, 'verdescuentos'])->name('descuentos');

route::get('/reporteventa', [VentaController::class, 'verReporteVentas'])->name('reporteventa');
