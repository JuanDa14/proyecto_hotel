<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\DetalleReserva;
use App\Models\Habitacion;
use App\Models\Reserva;
use App\Models\TipoHabitacion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use PDF;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservas = DB::table('reserva as r')
            ->join('users as u', 'u.id', '=', 'r.iduser')
            ->join('cliente as c', 'c.id', '=', 'r.idcliente')
            ->select('c.nombres', 'u.name', 'u.apellidos', 'r.id', 'r.fecha', 'r.tipoPago')->get();
        return view('reservas.index', compact('reservas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vendedores = User::all();
        $clientes = Cliente::all();
        $habitaciones = DB::table('habitaciones as h')->join('tipo_habitaciones as t', 'h.tipoHabitacion_id', '=', 't.id')->select('h.id', 'h.numeroHabitacion', 't.descripcion', 't.precio', 't.disponible')->get();
        return view('reservas.create', compact('vendedores', 'clientes', 'habitaciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tamaño = count($request->precios);
        $reserva = new Reserva();
        $cliente = Cliente::where('dni', '=', $request->dni)->get();
        $reserva->fecha = date("Y-m-d");
        $reserva->estado = 'VALIDA';
        $reserva->idcliente = $cliente[0]->id;
        $reserva->iduser = $request->vendedor;
        $reserva->tipoPago = $request->tipoPago;
        $reserva->save();

        for ($i = 0; $i < $tamaño; $i++) {
            $detalleReserva = new DetalleReserva();
            $detalleReserva->cantidad = $request->cantidades[$i];
            $detalleReserva->precio = $request->precios[$i];
            $detalleReserva->importe = $request->precios[$i] * $request->cantidades[$i];
            $detalleReserva->idhabitacion = $request->idproductos[$i];
            $detalleReserva->idreserva = $reserva->id;
            $detalleReserva->save();
        }
        return redirect()->route('reservas.show', $reserva->id)->with('realizada', 'OK');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detalleReserva = DetalleReserva::where('idreserva', $id)->get();
        $ArrayHabitaciones = [];
        $ArrayPrecio = [];
        $Arraycantidades = [];
        $ArrayImporte = [];
        $importeTotal = 0;
        $i = 0;

        foreach ($detalleReserva as $detalle) {
            $habitacion = Habitacion::find($detalle->idhabitacion);
            $tipoHabitacion = TipoHabitacion::find($habitacion->tipoHabitacion_id);
            $reserva = Reserva::find($detalle->idreserva);
            $idreserva = $detalle->idreserva;
            $clientes = Cliente::find($reserva->idcliente);
            $cliente = $clientes->nombres;
            $vendedor = User::find($reserva->iduser);
            $ArrayPrecio[$i] = $detalle->precio;
            $ArrayHabitaciones[$i] = $tipoHabitacion->descripcion;
            $Arraycantidades[$i] = $detalle->cantidad;
            $ArrayImporte[$i] = $detalle->importe;
            $importeTotal += $detalle->importe;
            $i++;
        }
        return view('reservas.show', compact('cliente', 'vendedor', 'ArrayHabitaciones', 'Arraycantidades', 'ArrayImporte', 'importeTotal', 'idreserva', 'ArrayPrecio', 'reserva'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function imprimir($id)
    {
        $detalleReserva = DetalleReserva::where('idreserva', $id)->get();
        $ArrayHabitaciones = [];
        $ArrayPrecio = [];
        $Arraycantidades = [];
        $ArrayImporte = [];
        $importeTotal = 0;
        $i = 0;

        foreach ($detalleReserva as $detalle) {
            $habitacion = Habitacion::find($detalle->idhabitacion);
            $tipoHabitacion = TipoHabitacion::find($habitacion->tipoHabitacion_id);
            $reserva = Reserva::find($detalle->idreserva);
            $idreserva = $detalle->idreserva;
            $clientes = Cliente::find($reserva->idcliente);
            $cliente = $clientes->nombres;
            $vendedor = User::find($reserva->iduser);
            $ArrayPrecio[$i] = $detalle->precio;
            $ArrayHabitaciones[$i] = $tipoHabitacion->descripcion;
            $Arraycantidades[$i] = $detalle->cantidad;
            $ArrayImporte[$i] = $detalle->importe;
            $importeTotal += $detalle->importe;
            $i++;
        }
        $data = compact('cliente', 'vendedor', 'ArrayHabitaciones', 'Arraycantidades', 'ArrayImporte', 'importeTotal', 'idreserva', 'ArrayPrecio', 'reserva');
        $pdf = PDF::loadView('reservas.imprimir', $data);
        return $pdf->download('reporte_reserva_' . $idreserva . '.pdf');
    }

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
