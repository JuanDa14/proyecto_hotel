<?php

use App\Http\Controllers\ImpuestoController;
use App\Http\Controllers\VentaController;
use Illuminate\Support\Facades\Route;


route::get('/ObtenerDescuento/{year}/{month}', [VentaController::class, 'ObtenerDescuento']);
route::get('/obtenerVentas/{y}/{m}', [VentaController::class, 'registrarRV']);
