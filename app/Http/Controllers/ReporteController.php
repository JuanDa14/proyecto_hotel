<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
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


    function vista_reporte_financiero()
    {
        return view('reportes.financiero');
    }

    function reporte_financiero($a, $m)
    {

        $data = DB::table('detalle_pedidos as dp')
            ->join('pedidos as p', 'p.id', '=', 'dp.idpedido')
            ->join('proveedor as pr', 'p.idproveedor', '=', 'pr.id')
            ->join('productos as pro', 'dp.idproducto', '=', 'pro.id')
            ->whereYear('p.fechapedido', $a)
            ->whereMonth('p.fechapedido', $m)
            ->orderBy('p.fechapedido', 'desc')
            ->select('p.id', 'p.total as totalactivo', 'dp.cantidad', 'pro.nombre as producto', 'pr.nombre as proveedor', 'p.fechapedido', 'p.fechaentrega', 'p.total')
            ->get();

        return response()->json($data);
    }

    function imprimir_financiero(Request $request)
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


        $financieros = DB::table('detalle_pedidos as dp')
            ->join('pedidos as p', 'p.id', '=', 'dp.idpedido')
            ->join('proveedor as pr', 'p.idproveedor', '=', 'pr.id')
            ->join('productos as pro', 'dp.idproducto', '=', 'pro.id')
            ->whereYear('p.fechapedido', $a)
            ->whereMonth('p.fechapedido', $m)
            ->orderBy('p.fechapedido', 'desc')
            ->select('p.id', 'p.total as totalactivo', 'dp.cantidad', 'pro.nombre as producto', 'pr.nombre as proveedor', 'p.fechapedido', 'p.fechaentrega', 'p.total')
            ->get();


        $importeReservas = 0;
        $importeCostos = 0;


        // dd($financieros, $reservas->isNotEmpty());

        for ($i = 0; $i < count($reservas); $i++) {
            $importeReservas += $reservas[$i]->importe;
        }

        for ($i = 0; $i < count($financieros); $i++) {
            $importeCostos += $financieros[$i]->totalactivo;
        }

        $data = compact('reservas', 'a', 'm', 'importeCostos', 'importeReservas', 'financieros');

        $pdf = PDF::loadView('reportes.pdf_financiero', $data);
        return $pdf->download('reporte_financiero_' . $m . $a . '.pdf');
    }

    function imprimir_guia()
    {
        $pdf = PDF::loadView('guias.guia_usuario_pdf');
        return $pdf->download('guia_usuario.pdf');
    }
}
