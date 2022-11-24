@extends('adminlte::page')

@section('title', 'Nuevo Servicio Adicional')

@section('content')
    <div class="container-fluid pt-4">
        <div class="row mb-4">
            <div class="col-12 col-md-6 text-md-left">
                <h3 class="text-gray">Nuevo Servicio Adicional</h3>
            </div>
            <div class="col-12 col-md-6 text-md-right">
                <a href="{{ route('servicios.index') }}" class="btn btn-success">
                    <i class="fas fa-arrow-left"></i>
                    Regresar
                </a>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <form action="{{ route('servicios.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-8 form-group">
                            <label for="descripcion">Descripcion</label>
                            <input required type="text" class="form-control" id="descripcion" placeholder="Ingrese la descripcion" name="descripcion">
                        </div>
                        <div class="col-4 mt-3" style="display: flex; align-items: center">
                            <button type="submit" class="w-100 btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop