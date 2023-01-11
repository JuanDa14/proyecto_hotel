<?php

namespace App\Http\Controllers;

use App\Models\DetallePedido;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDetallePedidoRequest;
use App\Http\Requests\UpdateDetallePedidoRequest;

class DetallePedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDetallePedidoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDetallePedidoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetallePedido  $detallePedido
     * @return \Illuminate\Http\Response
     */
    public function show(DetallePedido $detallePedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetallePedido  $detallePedido
     * @return \Illuminate\Http\Response
     */
    public function edit(DetallePedido $detallePedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDetallePedidoRequest  $request
     * @param  \App\Models\DetallePedido  $detallePedido
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDetallePedidoRequest $request, DetallePedido $detallePedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetallePedido  $detallePedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetallePedido $detallePedido)
    {
        //
    }
}
