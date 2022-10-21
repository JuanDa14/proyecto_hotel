<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:ver.departamento')->only('index');
        $this->middleware('can:create.departamento')->only('create');
        $this->middleware('can:edit.departamento')->only('update');
        $this->middleware('can:destroy.departamento')->only('destroy');
    }

    public function index()
    {
        $departamento = Departamento::all()->where('estado','=','Activo');
        return view('controlDeStock.departamento.index', compact('departamento'));
    }

    public function store(Request $request)
    {
        $departamento = new Departamento();
        $departamento->departamento = $request->txtdepartamento;
        $departamento->save();
        return back()->with('correcto', 'Departamento agregado correctamente');
    }

    public function update(Request $request, $id)
    {
        $departamento = Departamento::find($id);
        $departamento->departamento = $request->txtdepartamento;
        $departamento->save();
        return back()->with('correcto', 'Departamento actualizado correctamente');
    }

    public function destroy($id)
    {
        $departamento = Departamento::find($id);
        $departamento->estado = 'Inactivo';
        $departamento->save();
        return redirect()->route('departamentos.index')->with('eliminar','OK');
    }
}
