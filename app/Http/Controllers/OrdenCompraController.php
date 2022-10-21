<?php

namespace App\Http\Controllers;

use App\Models\DetalleCompra;
use App\Models\Insumo;
use App\Models\OrdenCompra;
use Illuminate\Http\Request;
use PDF;

class OrdenCompraController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:ver.ordenCompra')->only('index');
        $this->middleware('can:create.ordenCompra')->only('create');
        $this->middleware('can:create.ordenCompra')->only('imprimir');
        $this->middleware('can:show.ordenCompra')->only('show');
    }

    public function index()
    {
        $ordenCompras = OrdenCompra::all()->where('estado', '!=', 'Invalida');
        return view('compra.index', compact('ordenCompras'));
    }

    public function create()
    {
        $insumos = Insumo::all();
        return view('compra.crear', compact('insumos'));
    }


    public function store(Request $request)
    {
        $tamaño = count($request->cantidades);
        $compra = new OrdenCompra();
        $compra->estado = 'Armado';
        $compra->proveedora = 'No Especificada';
        $compra->monto = 0.0;
        $compra->save();

        for ($i = 0; $i < $tamaño; $i++) {
            $detallecompra = new DetalleCompra();
            $detallecompra->cantidad = $request->cantidades[$i];
            $detallecompra->idordenCompra = $compra->id;
            $detallecompra->idInsumo = $request->insumos[$i];
            $detallecompra->save();
        }
        return redirect()->route('ordencompras.show', $compra->id)->with('registrada', 'OK');;
    }


    public function show($id)
    {

        $detallecompra = DetalleCompra::where('idordenCompra', $id)->get();
        $compra = OrdenCompra::find($id);
        $idcompra = $id;
        $ArrayInsumos = [];
        $Arraycantidades = [];
        $i = 0;

        foreach ($detallecompra as $detalle) {
            $insumo = Insumo::find($detalle->idInsumo);
            $ArrayInsumos[$i] = $insumo->insumo;
            $Arraycantidades[$i] = $detalle->cantidad;
            $i++;
        }
        return view('compra.show', compact('compra', 'ArrayInsumos', 'Arraycantidades', 'idcompra'));
    }

    public function imprimir($id)
    {
        $detallecompra = DetalleCompra::where('idordenCompra', $id)->get();
        $compra = OrdenCompra::find($id);
        $idcompra = $id;
        $ArrayInsumos = [];
        $Arraycantidades = [];
        $i = 0;

        foreach ($detallecompra as $detalle) {
            $insumo = Insumo::find($detalle->idInsumo);
            $ArrayInsumos[$i] = $insumo->insumo;
            $Arraycantidades[$i] = $detalle->cantidad;
            $i++;
        }
        $data = compact('compra', 'idcompra', 'ArrayInsumos', 'Arraycantidades');
        $pdf = PDF::loadView('compra.imprimir.pdf', $data);
        return $pdf->download('orden_compra_' . $idcompra . '.pdf');
    }

    public function validar($id)
    {
        $compra = OrdenCompra::find($id);
        $compra->estado = 'Validado';
        $compra->save();
        return redirect()->route('ordencompras.index')->with('validada', 'OK');
    }

    public function cancelar($id)
    {
        $compra = OrdenCompra::find($id);
        $compra->estado = 'Invalida';
        $compra->save();
        return redirect()->route('ordencompras.index')->with('rechazada', 'OK');
    }

    public function update(Request $request, $id)
    {
        $compra = OrdenCompra::find($id);
        if ($request->txtproveedora === 'No Especificada' || $request->txtmonto <= 0) return redirect()->route('ordencompras.index')->with('problema', 'OK');
        $compra->proveedora = $request->txtproveedora;
        $compra->estado = 'Archivada';
        $compra->monto = $request->txtmonto;
        $compra->save();
        return back()->with('archivada', 'OK');
    }
}
