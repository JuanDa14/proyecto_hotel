<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Empleado;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class EmpleadoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:ver.empleado')->only('index');
        $this->middleware('can:create.empleado')->only('store');
        $this->middleware('can:edit.empleado')->only('update');
        $this->middleware('can:destroy.empleado')->only('destroy');
    }

    public function index()
    {
        $empleados = DB::table('empleados as e')
            ->join('users as u', 'u.id', '=', 'e.idusuario')
            ->join('departamentos as d', 'd.id', '=', 'e.iddepartamento')
            ->join('tipo_empleados as te', 'te.id', '=', 'e.idtipoEmpleado')
            ->select('e.dni', 'e.nombre', 'e.apellidos', 'e.direccion', 'e.celular', 'te.tipoEmpleado', 'd.departamento', 'e.id')
            ->where('e.estado', '!=', 'vacado')
            ->where('te.tipoEmpleado', '!=', 'Gerente')
            ->get();
        return view('admin.users.empleado.index', compact('empleados'));
    }
    public function create()
    {
        $departamentos = Departamento::all()->where('departamento', '!=', 'Gerencia');
        return view('admin.users.empleado.crear', compact('departamentos'));
    }

    public function store(Request $request)
    {
        request()->validate(
            [
                'txtdni'   => 'max:8',
                'txtdni' => 'min:8',
                'txtcelular'   => 'max:9',
                'txtcelular'   => 'min:9'
            ],
        );
        $empleados = Empleado::all();
        $tamaño = count($empleados);
        $empleado = new Empleado();
        $empleado->dni = $request->txtdni;
        $empleado->nombre = $request->name;
        $empleado->apellidos = $request->txtapellidos;
        $empleado->direccion = $request->txtdireccion;
        $empleado->celular = $request->txtcelular;
        $empleado->idtipoEmpleado = 2;
        $empleado->iddepartamento = $request->txtdepartamento;
        $empleado->estado = 'contratado';
        $empleado->idrol = $request->txtdepartamento;

        $nuevoUsuario = new User();
        $nuevoUsuario->name = $request->name;
        $nuevoUsuario->email = $request->email;
        $nuevoUsuario->password = bcrypt($request->password);

        for ($i = 0; $i < $tamaño; $i++) {
            if ($empleados[$i]->correo === $request->email) return back()->with('error', 'El correo electronico ya esta registrado');
        }
        if ($request->password !== $request->password_confirmation) return back()->with('error', 'Las contraseñas no coindicen');

        $nuevoUsuario->save();
        $nuevoUsuario->roles()->sync($request->txtdepartamento);


        $empleado->idusuario = $nuevoUsuario->id;
        $empleado->save();
        return redirect()->route('empleados.index')->with('correcto', 'Empleado registrado correctamente');
    }

    public function edit($id)
    {
        $departamentos = Departamento::all()->where('departamento', '!=', 'Gerencia');
        $empleado = Empleado::find($id);
        $usuario = User::find($id);
        return view('admin.users.empleado.editar', compact('departamentos', 'empleado', 'usuario'));
    }

    public function update(Request $request, $id)
    {
        request()->validate(
            [
                'txtdni'   => 'max:8|min:8',
                'txtcelular'   => 'max:9|min:9',
            ],
        );
        $empleado = Empleado::find($id);
        $empleado->dni = $request->txtdni;
        $empleado->nombre = $request->name;
        $empleado->apellidos = $request->txtapellidos;
        $empleado->direccion = $request->txtdireccion;
        $empleado->celular = $request->txtcelular;
        $empleado->idtipoEmpleado = 2;
        $empleado->iddepartamento = $request->txtdepartamento;
        $empleado->idrol = $request->txtdepartamento;

        $usuario = User::find($id);
        $usuario->name = $request->name + ' ' + $request->txtapellidos;
        $usuario->email  = $request->email;
        $usuario->password  = bcrypt($request->password);

        if ($request->password !== $request->password_confirmation) return back()->with('error', 'Las contraseñas no coindicen');

        $usuario->roles()->sync($request->txtdepartamento);
        $empleado->save();
        $usuario->save();
        return redirect()->route('empleados.index')->with('correcto', 'Empleado actualizado correctamente');
    }

    public function destroy($id)
    {
        $empleado = Empleado::find($id);
        $rol = $empleado->iddepartamento;
        $usuario = User::find($id);
        $empleado->estado = 'vacado';
        $usuario->removeRole($rol);
        $empleado->save();
        $usuario->save();
        return redirect()->route('empleados.index')->with('eliminar', 'OK');
    }
}
