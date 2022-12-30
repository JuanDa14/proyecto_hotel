<?php

namespace App\Http\Controllers;

use App\Models\DetalleServicio;
use App\Models\Habitacion;
use App\Models\Service;
use App\Models\TipoHabitacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HabitacionController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:tipo_habitacion.view')->only('index');
        $this->middleware('can:tipo_habitacion.create')->only('create');
        $this->middleware('can:tipo_habitacion.update')->only('edit');
        $this->middleware('can:tipo_habitacion.show')->only('show');
    }

    public function index()
    {
        $habitaciones = DB::table('habitaciones as h')
            ->join('tipo_habitaciones as t', 't.id', '=', 'h.tipoHabitacion_id')
            ->select('h.id', 'h.numeroHabitacion', 't.descripcion')
            ->get();
        return view('habitacion.index', compact('habitaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = TipoHabitacion::all();
        $servicios = Service::all();
        $numero = DB::table('habitaciones')
                        ->max('numeroHabitacion');
        return view('habitacion.create', compact('tipos', 'servicios', 'numero'));
    }

    public function store(Request $request)
    {
        $habitacion = new Habitacion();

        $habitacion->numeroHabitacion = $request->nro;
        $habitacion->piso = $request->piso;
        $habitacion->nroCamas = $request->nroCamas;
        $habitacion->estado = $request->estado;
        $habitacion->tipoHabitacion_id = $request->tipo;
        $habitacion->save();

        $tam = count($request->servicios);
        
        for ($i=0; $i < $tam; $i++) { 
            $detalle = new DetalleServicio();
            $detalle->habitacion_id = $habitacion->id;
            $detalle->service_id = $request->servicios[$i];
            $detalle->save();
        }

        return redirect()->route('habitaciones.index');

    }

    public function show($id)
    {
        $habitaciones = Habitacion::all();
        $habitacion = $habitaciones->find($id);

        $tipo = DB::table('tipo_habitaciones as h')
            ->select('h.descripcion')
            ->where('id', '=', $habitacion->tipoHabitacion_id)
            ->get();

        $tipoH = null;

        for ($i=0; $i < count($tipo); $i++) { 
            $tipoH = $tipo[$i];
        }
        
        $detalleAll = DetalleServicio::where('habitacion_id',$id)->get();

        $servicios = [];
        $index = 0;

        foreach($detalleAll as $detalle) {
            $servicio = Service::find($detalle->service_id);
            $servicios[$index] = $servicio->descripcion;
            $index++;
        }

        return view('habitacion.show', compact('habitacion', 'servicios', 'tipoH'));
    }

    public function edit($id)
    {
        $habitaciones = Habitacion::all();
        $tipos = TipoHabitacion::all();
        $servicios = Service::all();
        $habitacion = $habitaciones->find($id);

        $detalles = DetalleServicio::where('habitacion_id', $id)->get();
        // dd($detalles);
        $servicios = [];
        $ids = [];
        $index = 0;

        foreach ($detalles as $item) {
            $servicio = Service::find($item->service_id);
            // $ids[$index] = $servicio->id;
            $servicios[$index] = $servicio;
            $index++;
        }
        // dd($servicios);

        return view('habitacion.edit', compact('habitacion', 'tipos', 'servicios', 'detalles'));
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        $habitaciones = Habitacion::all();
        $habitacion = $habitaciones->find($id);
        // dd($habitacion);
        $habitacion->update($request->all());

        // eliminar el detalle servicio
        $aux = DB::table('detalle_servicios')->where('habitacion_id',$id)->delete();


        $tam = count($request->servicios);
        
        for ($i=0; $i < $tam; $i++) { 
            $detalle = new DetalleServicio();
            $detalle->habitacion_id = $habitacion->id;
            $detalle->service_id = $request->servicios[$i];
            $detalle->save();
        }

        return redirect()->route('habitaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $habitaciones = Habitacion::all();
        $deleted = $habitaciones->find($id);
        $deleted->delete();
        return redirect()->route('habitaciones.index');
    }
}
