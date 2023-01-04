<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\DetalleReserva;
use App\Models\Proveedor;
use App\Models\Reserva;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:ver.dashboard')->only('dashboard');
    }

    public function dashboard()
    {
        $reservas = Reserva::all()->count();
        $clientes = Cliente::all()->count();
        $proveedores = Proveedor::all()->count();
        $usuarios = User::all()->count();
        
        $usermasRes = DB::table('reserva as r')
            ->join('users as u', 'u.id', '=', 'r.iduser')
            ->select('u.name', 'u.apellidos', DB::raw('COUNT(iduser) as user_count'))
            ->groupByRaw('u.name, u.apellidos')
            ->orderByRaw('user_count DESC')
            ->limit(1)
            ->get();


        $ingresos = DetalleReserva::sum('importe');

        $data = [];
        $año = getdate();

        for ($i=0; $i < 12; $i++) { 
            $reserva = count(Reserva::whereMonth('created_at', $i+1)->whereYear('created_at', $año['year'])->get());
            $data[$i] = $reserva;
        }

        return view('dashboard', compact('reservas', 'clientes', 'proveedores', 'usuarios', 'ingresos', 'data', 'usermasRes'));
    }

    public function grafico()
    {
        $reservas = Reserva::all();
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
            $reserva = count(Reserva::whereMonth('created_at', $i + 1)->get());
            $data[$i] = $reserva;
        }
        return view('reservas.grafico', compact('data', 'meses'));
    }
}
