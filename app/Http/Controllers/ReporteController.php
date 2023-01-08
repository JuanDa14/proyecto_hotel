<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use PDF;

class ReporteController extends Controller
{
    function vista_reporte_fecha()
    {
        return view('reportes.reservas');
    }

    function reporte_fecha($a, $m)
    {

        $reservas = DB::table('reserva as r')
            ->join('cliente as c', 'r.idcliente', '=', 'c.id')
            ->join('users as u', 'r.iduser', '=', 'u.id')
            ->join('tipo_pagos as tp', 'r.idtipopago', '=', 'tp.id')
            ->join('detalle_reserva as dr', 'r.id', '=', 'dr.idreserva')
            ->join('habitaciones as h', 'dr.idhabitacion', '=', 'h.id')
            ->join('tipo_habitaciones as th', 'h.tipoHabitacion_id', '=', 'th.id')
            ->whereYear('r.fecha', $a)
            ->whereMonth('r.fecha', $m)
            ->where('r.estado', 'VALIDA')
            ->select('r.id', 'r.fecha', 'c.nombres as cliente', 'u.name', 'u.apellidos', 'tp.descripcion as tipopago', 'th.descripcion as tipohabitacion', 'dr.importe')
            ->get();

        return Response::json($reservas);
    }

    function imprimir_reserva(Request $request)
    {

        $a = $request->año;
        $m = $request->mes;

        $reservas = DB::table('reserva as r')
            ->join('cliente as c', 'r.idcliente', '=', 'c.id')
            ->join('users as u', 'r.iduser', '=', 'u.id')
            ->join('tipo_pagos as tp', 'r.idtipopago', '=', 'tp.id')
            ->join('detalle_reserva as dr', 'r.id', '=', 'dr.idreserva')
            ->join('habitaciones as h', 'dr.idhabitacion', '=', 'h.id')
            ->join('tipo_habitaciones as th', 'h.tipoHabitacion_id', '=', 'th.id')
            ->whereYear('r.fecha', $a)
            ->whereMonth('r.fecha', $m)
            ->where('r.estado', 'VALIDA')
            ->select('r.id', 'r.fecha', 'c.nombres as cliente', 'u.name', 'u.apellidos', 'tp.descripcion as tipopago', 'th.descripcion as tipohabitacion', 'dr.importe')
            ->get();


        $importeTotal = 0;

        for ($i = 0; $i < count($reservas); $i++) {
            $importeTotal += $reservas[$i]->importe;
        }

        $data = compact('reservas', 'a', 'm', 'importeTotal');

        $pdf = PDF::loadView('reportes.pdf_reserva', $data);
        return $pdf->download('reporte_reserva_' . $m . $a . '.pdf');
    }
}
