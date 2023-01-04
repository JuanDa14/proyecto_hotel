@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div class="container-fuild pt-4">
    <div class="row mb-4">
        <div class="col-12 col-md-6 text-md-left">
            <h3 class="text-gray">Habitaciones</h3>
        </div>
        @can('habitacion.create')
        <div class="col-12 col-md-6 text-md-right">
            <a href="{{ route('habitaciones.create') }}"><button type="button" class="btn btn-success"><i class="fas fa-plus-circle"></i> Registrar habitacion</button></a>
        </div>
        @endcan
    </div>
    <table id="datatable" class="table dt-responsive nowrap text-center" style="width:100%">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Numero Habitacion</th>
                <th scope="col">Tipo</th>
                @can('habitacion.create')
                <th scope="col">Opciones</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @if (count($habitaciones) <= 0) <tr class="text-center">
                <td colspan="3">No hay Registros</td>
                </tr>
                @else
                @foreach ($habitaciones as $habitacion)
                <tr>
                    <td>{{ $habitacion->id }}</td>
                    <td>{{ $habitacion->numeroHabitacion }}</td>
                    <td>{{ $habitacion->descripcion }}</td>
                    @can('habitacion.create')
                    <td>
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <form action="{{ route('habitaciones.edit', $habitacion->id) }}" method="get">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                                </form>
                            </div>
                            <div class="col-12 col-md-4">
                                <form action="{{ route('habitaciones.destroy', $habitacion->id) }}" method="post" class="eliminar">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                            <div class="col-12 col-md-4">
                                <a href="{{ route('habitaciones.show', $habitacion->id) }}" class="btn btn-secondary">Ver servicios<i class="fas fa-info ml-2"></i></a>
                            </div>
                        </div>
                    </td>
                    @endcan
                </tr>
                @endforeach
                @endif
        </tbody>
    </table>
</div>
@stop

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>
<script src="/js/dataTable.js"></script>
@stop