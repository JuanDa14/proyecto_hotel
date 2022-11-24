@extends('adminlte::page')

@section('title', 'Ver cliente')

@section('content')

<section class="container-fuild pt-4">
    <div class="row mb-4">
        <div class="col-12 col-md-6 text-md-left">
            <h3 class="text-gray">Ver cliente</h3>
        </div>
        <div class="col-12 col-md-6 text-md-right">
            <a href="{{ route('clientes.index') }}"><button type="button" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Volver</button></a>
        </div>
    </div>
    <div class="header">
        <br>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Datos del cliente</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col md-6">
                                <div class="form-group row">
                                    <label for="dni" class="col-sm-4 col-form-label">Dni</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="dni" name="dni" value="{{ $cliente->dni }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nombres" class="col-sm-4 col-form-label">Nombres</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="nombres" name="nombres" value="{{ $cliente->nombres }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="apellidos" class="col-sm-4 col-form-label">Apellidos</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ $cliente->apellidos }}" readonly>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="genero" class="col-sm-4 col-form-label">Genero</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="genero" name="genero" value="{{ $cliente->genero }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fecha_nacimiento" class="col-sm-4 col-form-label">Fecha de nacimiento</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ $cliente->fecha_nacimiento }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="telefono" class="col-sm-4 col-form-label">Telefono</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $cliente->telefono }}" readonly>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="correo" class="col-sm-4 col-form-label">Correo</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="correo" name="correo" value="{{ $cliente->correo }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="direccion" class="col-sm-4 col-form-label">Direccion</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $cliente->direccion }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="estado" class="col-sm-4 col-form-label">Estado</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="estado" name="estado" value="{{ $cliente->estado }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection