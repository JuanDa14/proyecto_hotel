@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid pt-4">
        <div class="row mb-4">
            <div class="col-12 col-md-6 text-md-left">
                <h3 class="text-gray">Detalle Habitación</h3>
            </div>
            <div class="col-12 col-md-6 text-md-right">
                <a href="{{ route('habitaciones.index') }}" class="btn btn-success">
                    <i class="fas fa-arrow-left"></i>
                    Regresar
                </a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row container">
                    <div class="col-12 col-md-4">
                        <label class="col-6">Nro Habitación</label>
                        <span>{{ $habitacion->numeroHabitacion }}</span>
                    </div>

                    <div class="col-12 col-md-4">
                        <label class="col-6">Nro de Camas</label>
                        <span>{{ $habitacion->nroCamas }}</span>
                    </div>

                    <div class="col-12 col-md-4">
                        <label class="col-6">Precio</label>
                        <span>{{ $tipoP->precio }}</span>
                    </div>

                    <div class="col-12 col-md-4">
                        <label class="col-6">Estado</label>
                        <span>{{ $habitacion->estado }}</span>
                    </div>

                    <div class="col-12 col-md-4">
                        <label class="col-6">Tipo de Habitación</label>
                        <span>{{ $tipoH->descripcion }}</span>
                    </div>

                    
                    <h5 class="col-12 mt-2">Servicios adicionales</h5>
                    <table class="table text-center mt-1">
                        <thead>
                            <th>Servicios</th>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < count($servicios); $i++)
                                <tr>
                                    <td>{{ $servicios[$i] }}</td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop