<?php

namespace App\Http\Controllers;

use App\Models\TipoHabitacion;
use Illuminate\Http\Request;

class TipoHabitacionController extends Controller
{
   

    public function __construct()
    {
        $this->middleware('can:habitacion.view')->only('index');
        $this->middleware('can:habitacion.create')->only('create');
        $this->middleware('can:habitacion.update')->only('edit');
        $this->middleware('can:habitacion.show')->only('show');
    }

    public function index()
    {
        $tipos = TipoHabitacion::all();
        return view('tipoHabitacion.index', compact('tipos'));
    }

    public function create()
    {
        return view('tipoHabitacion.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required',
            'precio' => 'required'
        ]);
        $tipo = new TipoHabitacion();
        $tipo->precio = $request->precio;
        $tipo->descripcion = $request->descripcion;
        $tipo->save();

        return redirect()->route('tipoHabitaciones.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $tipos = TipoHabitacion::all();
        $tipo = $tipos->find($id);
        return view('tipoHabitacion.edit', compact('tipo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'descripcion' => 'required',
            'precio' => 'required'
        ]);
        $tipos = TipoHabitacion::all();
        $updated = $tipos->find($id);
        $updated->update($request->all());
        return redirect()->route('tipoHabitaciones.index');
    }

    public function destroy($id)
    {
        $tipos = TipoHabitacion::all();
        $deleted = $tipos->find($id);
        $deleted->delete();
        return redirect()->route('tipoHabitaciones.index');
    }
}
