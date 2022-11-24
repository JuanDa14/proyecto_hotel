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
                    <label class="col-3">Nro Habitación</label>
                    <span>{{ $habitacion->numeroHabitacion }}</span>

                    <label class="col-3">Nro de Camas</label>
                    <span>{{ $habitacion->nroCamas }}</span>

                    <label class="col-3">Precio</label>
                    {{-- <span>{{ $habitacion-> }}</span> --}}
                    <label class="col-3">Estado</label>
                    <span>{{ $habitacion->estado }}</span>
                    <label>Tipo de Habitación</label>
                    <span>{{ $tipoH->descripcion }}</span>
                    
                    <h5 class="col-12">Servicios adicionales</h5>
                    <table class="table text-center">
                        <thead>
                            <th>Servicio</th>
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