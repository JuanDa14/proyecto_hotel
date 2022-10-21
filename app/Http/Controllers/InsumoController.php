<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use Illuminate\Http\Request;


class InsumoController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:ver.insumo')->only('index');
        $this->middleware('can:create.insumo')->only('store');
        $this->middleware('can:edit.insumo')->only('update');
        $this->middleware('can:destroy.insumo')->only('destroy');
    }

    public function index()
    {
        $insumos = Insumo::all();
        return view('controlDeStock.insumos.index', compact('insumos'));
    }

    public function store(Request $request)
    {
        $insumo = new Insumo();
        $insumo->insumo = $request->txtnombre;
        $insumo->descripcion = $request->txtdescripcion;
        $insumo->save();
        return back()->with('correcto', 'Insumo agregado correctamente');
    }

    public function update(Request $request, $id)
    {
        $insumo = Insumo::find($id);
        $insumo->insumo = $request->txtnombre;
        $insumo->descripcion = $request->txtdescripcion;
        $insumo->save();
        return back()->with('correcto', 'Insumo actualizado correctamente');
    }


    public function destroy($id)
    {
        Insumo::find($id)->delete();
        return redirect()->route('insumos.index')->with('eliminar', 'OK');
    }
}
