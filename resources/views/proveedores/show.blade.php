@extends('adminlte::page')

@section('title', 'Ver proveedor')

@section('content')

<div class="container-fuild px-4 pt-4">
    <div class="row mb-4">
        <div class="col-12 col-md-6 text-md-left">
            <h3 class="text-red-500">Ver Proveedor</h3>
        </div>
        <div class="col-12 mt-3 d-flex justify-content-between text-md-right">
            <a href="{{ route('proveedores.edit',$proveedor->id) }}"><button type="button" class="btn btn-success"><i class="fas fa-edit"></i> Editar</button></a>
            <a href="{{ route('proveedores.index') }}"><button type="button" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Volver</button></a>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <div class="col form-group">
                    <label for="name">Nombres</label>
                    <input required type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingresar nombres" name="nombre" value="{{ $proveedor->nombre }}" disabled>
                </div>

                <div class="col form-group">
                    <label for="name">Direccion</label>
                    <input required type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingresar apellidos" name="direccion" value="{{ $proveedor->direccion }}" disabled>
                </div>
            </div>

            <div class="row">
                <div class="col-3 form group">
                    <label for="name">Teléfono</label>
                    <input required type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingresar teléfono" name="telefono" value="{{ $proveedor->telefono }}" disabled>
                </div>
                <div class="col-3 form-group">
                    <label for="exampleInputEmail1">Correo</label>
                    <input required type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingrese email" name="correo" value="{{ $proveedor->correo }}" disabled>
                </div>
                <div class="col-6 form group">
                    <label for="exampleInputEmail1">Numero de estrellas</label>
                    <select class="form-control" aria-label="Default select example" name="estrellas" class="form-control" required disabled>
                        <option disabled selected value="">Seleccione la cantidad de estrellas</option>
                        <option value="1" @if($proveedor->estrellas == 1) selected @endif>1 estrella</option>
                        <option value="2" @if($proveedor->estrellas == 2) selected @endif>2 estrellas</option>
                        <option value="3" @if($proveedor->estrellas == 3) selected @endif>3 estrellas</option>
                        <option value="4" @if($proveedor->estrellas == 4) selected @endif>4 estrellas</option>
                        <option value="5" @if($proveedor->estrellas == 5) selected @endif>5 estrellas</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
@stop