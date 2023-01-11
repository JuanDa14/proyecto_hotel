<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePedidoRequest;
use App\Http\Requests\UpdatePedidoRequest;
use App\Models\DetallePedido;
use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = DB::table('pedidos as p')
            ->join('proveedor as r', 'r.id', '=', 'p.idproveedor')
            ->select('p.id', 'p.fechapedido','p.fechaentrega','p.total','r.nombre')->get();
        return view('pedidos.index', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedores = Proveedor::all();
        $productos = Producto::all();
        return view('pedidos.create', compact('proveedores', 'productos'));
    }

   
    public function store(Request $request)
    {
        $tam = count($request->precios);
        $pedido = new Pedido();
        $pedido->idproveedor = $request->proveedor;
        $pedido->iduser = Auth::user()->id;
        $pedido->fechapedido = now();
        $pedido->fechaentrega = $request->fechap;
        $pedido->total = $request->total;
        $pedido->save();

        for ($i=0; $i < $tam; $i++) {
            $detalle = new DetallePedido();
            $detalle->cantidad = $request->cantidades[$i];
            $detalle->precio = $request->precios[$i];
            $detalle->idproducto = $request->ids[$i];
            $detalle->idpedido = $pedido->id;
            $detalle->save();
        }
        return redirect()->route('pedidos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePedidoRequest  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePedidoRequest $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
