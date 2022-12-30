@extends('adminlte::page')

@section('title', 'Nueva Habitación')

@section('content')
    <div class="container-fluid pt-4">
        <div class="row mb-4">
            <div class="col-12 col-md-6 text-md-left">
                <h3 class="text-gray">Nueva Habitación</h3>
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
                <form action="{{ route('habitaciones.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-6 col-md-4 form-group">
                            <label for="nro">Nro Habitación</label>
                            {{-- <input required type="text" class="form-control" id="nro" placeholder="Ingrese el nro habitación" value="{{ $numero + 1 }}" name="nro" readonly> --}}
                            <input required type="text" class="form-control" id="nro" placeholder="Ingrese el nro habitación" name="nro">
                        </div>
                        <div class="col-6 col-md-4 form-group">
                            <label for="piso">Nro Piso</label>
                            <input required type="text" class="form-control" id="piso" placeholder="Ingrese el piso" name="piso">
                        </div>
                        <div class="col-12 col-md-4 form-group">
                            <label for="tipo">Tipo Habitación</label>
                            <select name="tipo" id="tipo" class="form-control">
                                <option value="" disabled selected>-- Selecciona --</option>
                                @foreach ($tipos as $tipo)
                                    <option value="{{ $tipo->id }}">{{ $tipo->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6 form-group">
                            <label for="nroCamas">Nro Camas</label>
                            <input required type="text" class="form-control" id="nroCamas" placeholder="Ingrese el nro camas" name="nroCamas">
                        </div>
                        <div class="col-6 form-group">
                            <label for="estado">Estado</label>
                            <select name="estado" id="estado" class="form-control">
                                <option value="" disabled selected>-- Selecciona --</option>
                                <option value="disponible">Disponible</option>
                                <option value="reservada">Reservada</option>
                                <option value="ocupada">Ocupada</option>
                            </select>
                        </div>
                        <div class="col-12 form-group">
                            <label for="serv">Servicios Adicionales</label>
                            <select id="serv" class="form-control">
                                <option value="" disabled selected>-- Selecciona --</option>
                                @foreach ($servicios as $servicio)
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
                            <tbody id="body"></tbody>
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
    <script src="/js/addservicios.js"></script>
@stop