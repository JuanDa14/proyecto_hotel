<?php

namespace App\Http\Controllers;

use App\Models\Boleta;
use App\Models\Cliente;
use App\Models\DetalleBoleta;
use App\Models\Empleado;
use App\Models\Producto;
use App\Models\TipoPago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class VentaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:ver.venta')->only('index');
        $this->middleware('can:create.venta')->only('create');
        $this->middleware('can:create.venta')->only('imprimir');
        $this->middleware('can:show.venta')->only('show');
    }

    public function index()
    {
        $ventas = DB::table('boletas as b')
            ->join('empleados as e', 'e.id', '=', 'b.idEmpleado')
            ->join('tipo_pagos as tp', 'tp.id', '=', 'b.idtipoPago')
            ->join('clientes as c', 'c.id', '=', 'b.idCliente')
            ->select('c.nombres', 'e.nombre', 'e.apellidos', 'tp.tipoPago', 'b.id', 'b.created_at')->get();
        return view('venta.index', compact('ventas'));
    }

    public function create()
    {
        $productos = Producto::all();
        $empleados = Empleado::all()->where('idtipoEmpleado', '!=', 1)->where('iddepartamento', '=', 2);
        $tipoPago = TipoPago::all();
        $clientes = Cliente::all();
        return view('venta.create', compact('productos', 'empleados', 'tipoPago', 'clientes'));
    }

    public function store(Request $request)
    {
        $tamaño = count($request->precios);
        $boleta = new Boleta();
        $cliente = Cliente::where('dni', '=', $request->dni)->get();
        $boleta->idCliente = $cliente[0]->id;
        $boleta->idEmpleado = $request->vendedor;
        $boleta->idtipoPago = $request->tipoPago;
        $boleta->Fecha = date("Y-m-d");
        $boleta->save();
        for ($i = 0; $i < $tamaño; $i++) {
            $detalleBoleta = new DetalleBoleta();
            $detalleBoleta->cantidad = $request->cantidades[$i];
            $detalleBoleta->precio = $request->precios[$i];
            $detalleBoleta->importe = $request->precios[$i] * $request->cantidades[$i];
            $detalleBoleta->idProducto = $request->idproductos[$i];
            $detalleBoleta->idBoleta = $boleta->id;
            $detalleBoleta->save();
        }
        return redirect()->route('ventas.show', $boleta->id)->with('realizada', 'OK');
    }

    public function imprimir($idboleta)
    {
        $detalleBoletas = detalleBoleta::where('idBoleta', $idboleta)->get();
        $ArrayProductos = [];
        $ArrayPrecio = [];
        $Arraycantidades = [];
        $ArrayImporte = [];
        $importeTotal = 0;
        $i = 0;

        foreach ($detalleBoletas as $detalleBoleta) {
            $producto = Producto::find($detalleBoleta->idProducto);
            $boleta = Boleta::find($detalleBoleta->idBoleta);
            $idboleta = $detalleBoleta->idBoleta;
            $clientes = Cliente::find($boleta->idCliente);
            $cliente = $clientes->nombres;
            $vendedor = Empleado::find($boleta->idEmpleado);
            $ArrayPrecio[$i] = $detalleBoleta->precio;
            $ArrayProductos[$i] = $producto->producto;
            $Arraycantidades[$i] = $detalleBoleta->cantidad;
            $ArrayImporte[$i] = $detalleBoleta->importe;
            $importeTotal += $detalleBoleta->importe;
            $i++;
        }

        $data = compact('cliente', 'vendedor', 'ArrayProductos', 'Arraycantidades', 'ArrayImporte', 'importeTotal', 'idboleta', 'ArrayPrecio', 'boleta');
        $pdf = PDF::loadView('venta.imprimir.pdf', $data);
        return $pdf->download('reporte_venta_' . $idboleta . '.pdf');
    }

    public function imprimirReporte(Request $request)
    {
        $año = $request->año;
        $mes = $request->mes;
        $meses = ['', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Setiembre', 'Octubre', 'Nobiembre', 'Diciembre'];
        $datos = DB::select('select b.id,concat(e.nombre," ",e.apellidos) as empleado,c.nombres as cliente,p.producto,d.cantidad,d.precio as precio,d.importe as importe
        from detalle_boletas d inner join boletas b on b.id=d.idBoleta 
        inner join empleados e on b.idEmpleado=e.id 
        inner join productos p on d.idProducto=p.id 
        inner join clientes c on b.idCliente=c.id
        where year(b.Fecha) = ? and month(b.Fecha) = ? ', [$año, $mes]);

        $importeTotal = DB::select('select SUM(d.importe) as importe
        from detalle_boletas d inner join boletas b on b.id=d.idBoleta 
        where year(b.Fecha) = ? and month(b.Fecha) = ?', [$año, $mes]);

        $pdf = PDF::loadView('venta.imprimir.reporteVenta', compact('datos', 'importeTotal', 'año', 'mes', 'meses'));
        return $pdf->download('reporte_Mensual' . $año . '/' . $mes . '.pdf');
    }

    public function show($idboleta)
    {
        $detalleBoletas = DetalleBoleta::where('idBoleta', $idboleta)->get();
        $ArrayProductos = [];
        $ArrayPrecio = [];
        $Arraycantidades = [];
        $ArrayImporte = [];
        $importeTotal = 0;
        $i = 0;

        foreach ($detalleBoletas as $detalleBoleta) {
            $producto = Producto::find($detalleBoleta->idProducto);
            $boleta = Boleta::find($detalleBoleta->idBoleta);
            $idboleta = $detalleBoleta->idBoleta;
            $clientes = Cliente::find($boleta->idCliente);
            $cliente = $clientes->nombres;
            $vendedor = Empleado::find($boleta->idEmpleado);
            $ArrayPrecio[$i] = $detalleBoleta->precio;
            $ArrayProductos[$i] = $producto->producto;
            $Arraycantidades[$i] = $detalleBoleta->cantidad;
            $ArrayImporte[$i] = $detalleBoleta->importe;
            $importeTotal += $detalleBoleta->importe;
            $i++;
        }
        return view('venta.show', compact('cliente', 'vendedor', 'ArrayProductos', 'Arraycantidades', 'ArrayImporte', 'importeTotal', 'idboleta', 'ArrayPrecio', 'boleta'));
    }

    public function graficoVentasMes()
    {
        $ventas = Boleta::all();
        $meses = [
            "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Diciembre",
        ];
        $data = [];
        for ($i = 0; $i < 12; $i++) {
            $venta = count(Boleta::whereMonth('created_at', $i + 1)->get());
            $data[$i] = $venta;
        }
        return view('graficos.ventasMes', compact('data', 'meses'));
    }

    public function verdescuentos()
    {
        return view('reportes.descuentos');
    }

    public function ObtenerDescuento($year, $month)
    {
        $descuento = DB::select('SELECT  t.idempleado, t.empleado, MAX(t.ventas) as num_ventas from
        (SELECT  b.idEmpleado as idempleado, concat(e.nombre," ",e.apellidos) as empleado, COUNT(b.idEmpleado) as ventas 
        from boletas b inner join empleados e on b.idEmpleado=e.id WHERE year(b.Fecha) = ? and month(b.Fecha) = ? 
        group BY e.nombre,e.apellidos,b.idEmpleado) t group by t.empleado,t.idempleado order by num_ventas desc limit 1', [$year, $month]);
        return $descuento;
    }

    public function registrarCliente(Request $request)
    {


        $cliente = Cliente::where('dni', intval($request->txtdni))->get();
        if (count($cliente) > 0) return back()->with('error', 'Dni ya registrado');
        if (strlen($request->txtdni) !=8) return back()->with('error', 'Dni no tiene el tamaño correcto');
        $nuevoCliente = new Cliente();
        $nuevoCliente->nombres = $request->txtnombres;
        $nuevoCliente->dni = $request->txtdni;
        $nuevoCliente->save();
        return back()->with('correcto', 'Cliente registrado correctamente');
    }


    public function verReporteVentas()
    {
        return view('reportes.reporteventas');
    }

    public function registrarRV($y, $m)
    {
        $reporte = DB::select('select b.id,concat(e.nombre," ",e.apellidos) as empleado,c.nombres as cliente,p.producto,d.cantidad,d.precio as precio,d.importe as importe
        from detalle_boletas d inner join boletas b on b.id=d.idBoleta 
        inner join empleados e on b.idEmpleado=e.id 
        inner join productos p on d.idProducto=p.id 
        inner join clientes c on b.idCliente=c.id
        where year(b.Fecha) = ? and month(b.Fecha) = ? ', [$y, $m]);

        // $reporte = DB::select('select  b.id,SUM(db.importe) as importe 
        // from detalle_boletas db inner join boletas b on db.idBoleta=b.id where year(b.Fecha) = ? and month(b.Fecha)=? group BY b.id',[$y,$m]);
        return $reporte;
    }
}
