<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:ver.producto')->only('index');
        $this->middleware('can:create.producto')->only('store');
        $this->middleware('can:edit.producto')->only('update');
        $this->middleware('can:destroy.producto')->only('destroy');
    }

    public function index()
    {
        $productos = Producto::all()->where('estado', '!=', 'Agotado');
        return view('controlDeStock.producto.index', compact('productos'));
    }

    public function store(Request $request)
    {
        $producto = new Producto();
        $producto->producto = $request->txtnombre;
        $producto->descripcion = $request->txtdescripcion;
        $producto->estado = 'Disponible';
        $producto->save();
        return back()->with('correcto', 'Producto agregado correctamente');
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);
        $producto->producto = $request->txtnombre;
        $producto->descripcion = $request->txtdescripcion;
        $producto->save();
        return back()->with('correcto', 'Producto actualizado correctamente');
    }


    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->estado = 'Agotado';
        $producto->save();
        return redirect()->route('productos.index')->with('eliminar','OK');
    }
}
