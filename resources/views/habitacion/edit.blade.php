@extends('adminlte::page')

@section('title', 'Nueva Habitación')

@section('content')
    <div class="container-fluid pt-4">
        <div class="row mb-4">
            <div class="col-12 col-md-6 text-md-left">
                <h3 class="text-gray">Editar Habitación</h3>
            </div>
            <div class="col-12 col-md-6 text-md-right">
                <a href="{{ route('habitaciones.index') }}" class="btn btn-success">
                    <i class="fas fa-arrow-left"></i>
                    Regresar
                </a>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <form action="{{ route('habitaciones.update', $habitacion->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-6 col-md-4 form-group">
                            <label for="nro">Nro Habitación</label>
                            <input required type="text" class="form-control" id="nro" placeholder="Ingrese el nro habitación" value="{{ $habitacion->numeroHabitacion }}" name="nro" readonly>
                        </div>
                        <div class="col-6 col-md-4 form-group">
                            <label for="piso">Nro Piso</label>
                            <input required type="text" class="form-control" id="piso" placeholder="Ingrese el piso" name="piso" value="{{ $habitacion->piso }}">
                        </div>
                        <div class="col-12 col-md-4 form-group">
                            <label for="tipo">Tipo Habitación</label>
                            <select name="tipo" id="tipo" class="form-control">
                                <option value="" disabled selected>-- Selecciona --</option>
                                @foreach ($tipos as $tipo)
                                    <option @if ($habitacion->tipoHabitacion_id === $tipo->id)
                                                selected
                                            @endif
                                        value="{{ $tipo->id }}">{{ $tipo->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6 form-group">
                            <label for="nroCamas">Nro Camas</label>
                            <input required type="text" class="form-control" id="nroCamas" placeholder="Ingrese el nro camas" name="nroCamas" value="{{ $habitacion->nroCamas }}">
                        </div>
                        <div class="col-6 form-group">
                            <label for="estado">Estado</label>
                            <select name="estado" id="estado" class="form-control">
                                <option value="" disabled selected>-- Selecciona --</option>
                                <option @if ($habitacion->estado === "disponible")
                                            selected
                                        @endif
                                    value="disponible">Disponible</option>
                                <option @if ($habitacion->estado === "reservada")
                                            selected
                                        @endif
                                    value="reservada">Reservada</option>
                                <option @if ($habitacion->estado === "ocupada")
                                            selected
                                        @endif
                                    value="ocupada">Ocupada</option>
                            </select>
                        </div>
                        <div class="col-12 form-group">
                            <label for="serv">Servicios Adicionales</label>
                            <select id="serv" class="form-control">
                                <option value="" disabled selected>-- Selecciona --</option>
                                @foreach ($servi as $servicio)
                                    <option value="{{ $servicio->id }}_{{ $servicio->descripcion }}">{{ $servicio->descripcion }}</option>
                                @endforeach
                            </select>
                            <button type="button" class="btn btn-outline-success mt-2" id="addservicio">Añadir</button>
                        </div>
                        <h5 class="col-12">Servicios Adicionales</h5>
                        <table class="table text-center mt-3">
                            <thead>
                                <th>ID</th>
                                <th>Descripcion</th>
                                <th>Opción</th>
                            </thead>
                            <tbody id="body">
                                @php($in = 0)
                                @foreach ($servicios as $item)
                                <tr id="fila{{ $in }}">
                                    <td>
                                        <input type="text" name="servicios[]" value="{{ $item->id }}" hidden>
                                        <label>{{ $item->id }}</label>
                                    </td>
                                    <td>
                                        <label>{{ $item->descripcion }}</label>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger" onclick="removeRow({{$in}})">X</button>
                                    </td>
                                    <label hidden>{{$in++}}</label>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/js/addservicios2.js"></script>
@stop