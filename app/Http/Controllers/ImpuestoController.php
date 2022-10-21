<?php

namespace App\Http\Controllers;

use App\Models\Impuesto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class ImpuestoController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:ver.impuesto')->only('index');
        $this->middleware('can:create.impuesto')->only('create');
        $this->middleware('can:reporte.impuesto')->only('Vistareporte');
        $this->middleware('can:show.impuesto')->only('show');
    }

    public function index()
    {
        $impuestos = DB::table('impuestos')->get();
        return view('impuestos.index', compact('impuestos'));
    }


    public function create()
    {
        return view('impuestos.crear');
    }


    public function store(Request $request)
    {
        $request->validate([
            'txtdni' => 'max:8|min:8'
        ]);
        $fecha = Carbon::parse($request->fecha);

        $existe = DB::table('impuestos')->whereYear('fecha','=',$fecha->year)->whereMonth('fecha','=',$fecha->month)->get();
        if (count($existe)>0) {
        return back()->with('error', 'Ya se ha registrado un impuesto en el periodo: '.$request->txtfecha);
        }else {
        $impuesto = new Impuesto();
        $impuesto->dnicontador = $request->txtdni;
        $impuesto->contador = $request->txtcontador;
        $impuesto->fecha = $request->txtfecha;
        $impuesto->monto = $request->txtmonto;
        $impuesto->save();
        return redirect()->route('impuestos.index')->with('correcto', 'Se ha registrado el pago del impuesto correctamente');
        }
    }

    public function show($id){
        $impuesto = Impuesto::find($id);
        return view('impuestos.show', compact('impuesto'));
    }

    public function imprimir($idimpuesto)
    {
        $impuesto = Impuesto::find($idimpuesto);
        $data = compact('impuesto');
        $pdf = PDF::loadView('impuestos.imprimir.pdf', $data);
        return $pdf->download('reporte_impuesto_' . $idimpuesto . '.pdf');
    }

    public function Vistareporte()
    {
        setlocale(LC_ALL, "es");
        $mes = ucfirst(strftime("%A %d de %B del %Y", strtotime(date('Y-m-d'))));
        return view('reportes.impuestos', compact('mes'));
    }


    public function reporte($A)
    {
        $impuesto = DB::select('select i.id as id, i.dnicontador as dni,i.contador as contador,i.fecha as fecha,i.monto as monto from impuestos i where year(i.fecha) = ?', [$A]);
        return $impuesto;
    }

}
