@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid pt-4">
    <div class="row mb-4">
        <div class="col-12 col-md-6 text-md-left">
            <h3 class="text-gray">Nuevo Tipo de Habitacion</h3>
        </div>
        <div class="col-12 col-md-6 text-md-right">
            <a href="{{ route('tipoHabitaciones.index') }}" class="btn btn-success">
                <i class="fas fa-arrow-left"></i>
                Regresar
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('tipoHabitaciones.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="descripcion">Descripcion</label>
                    <input type="text" id="descripcion" name="descripcion" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="precio">Precio</label>
                    <input type="text" id="precio" name="precio" class="form-control">
                </div>
                <button type="submit" class="btn btn-outline-primary">Guardar</button>
            </form>
        </div>
    </div>
</div>
@stop

@section('js')

@stop