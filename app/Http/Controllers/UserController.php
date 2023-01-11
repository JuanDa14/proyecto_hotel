<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{


    public function __construct()
    {
        $this->middleware('can:user.view')->only('index');
        $this->middleware('can:user.create')->only('create');
        $this->middleware('can:user.update')->only('edit');
        $this->middleware('can:user.show')->only('show');
    }

    public function index()
    {
        $users = DB::table("model_has_roles as m")
            ->join("users as u", "u.id", "=", "m.model_id")
            ->join("roles as r", "r.id", "=", "m.role_id")
            ->select("u.id", "u.name as nombre", "u.apellidos", "u.dni", "u.email", "u.estado", "u.telefono", "u.direccion", "u.genero", "u.fechanacimiento", "r.name")
            ->where("r.id", "!=", "1")
            ->get();


        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cargos = DB::select('select * from roles');
        return view('user.create', compact('cargos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->txtnombres;
        $user->apellidos = $request->txtapellidos;
        $user->telefono = $request->txttelefono;
        $user->email = $request->txtcorreo;
        $user->password = bcrypt('password');
        $user->direccion = $request->txtdireccion;
        $user->genero = $request->txtgenero;
        $user->fechanacimiento = $request->txtfechanacimiento;
        $user->dni = $request->txtdni;
        $user->assignRole($request->cargo);


        $founded = User::where('email', '=', $request->txtcorreo)->first();

        if ($founded === null) {
            $user->save();
            return redirect('user');
        }

        return redirect('user/create')->withErrors(['Email ya registrado', 'Sin stock disponible']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = User::find($id);
        $rol = DB::select('select m.role_id from model_has_roles as m where m.model_id=?', [$id])[0]->role_id;

        $cargos = DB::select('select * from roles');
        return view('user.edit', compact('user', 'cargos', 'rol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user = User::find($user->id);
        $user->name = $request->txtnombres;
        $user->apellidos = $request->txtapellidos;
        $user->telefono = $request->txttelefono;
        $user->email = $request->txtcorreo;
        $user->estado = 'ACTIVO';
        $user->direccion = $request->txtdireccion;
        $user->genero = $request->txtgenero;
        $user->fechanacimiento = $request->txtfechanacimiento;
        $user->dni = $request->txtdni;
        $user->assignRole($request->cargo);

        $user->save();
        return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function inhabilitar($id)
    {
        $user = User::find($id);
        $aux = "";

        if ($user->estado == 'INACTIVO') {
            $user->estado = 'ACTIVO';
            $aux = $user->email;
            $user->email =   $user->telefono;
            $user->telefono = $aux;
        }

        if ($user->estado == 'ACTIVO') {
            $user->estado = 'INACTIVO';
            $aux = $user->email;
            $user->email =   $user->telefono;
            $user->telefono = $aux;
        }

        $user->save();

        return redirect()->back();
    }
}
