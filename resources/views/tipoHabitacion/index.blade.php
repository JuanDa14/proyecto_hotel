@extends('adminlte::page')

@section('title', 'Tipo de Habitaciones')

@section('content')
<div class="container-fuild pt-4">
    @can('tipo_habitacion.create')
    <div class="row mb-4">
        <div class="col-12 col-md-6 text-md-left">
            <h3 class="text-gray">Tipo de Habitaciones</h3>
        </div>
        <div class="col-12 col-md-6 text-md-right">
            <a href="{{ route('tipoHabitaciones.create') }}"><button type="button" class="btn btn-success"><i class="fas fa-plus-circle"></i> Crear tipo de habitacion</button></a>
        </div>
    </div>
    @endcan
    <table id="datatable" class="table dt-responsive nowrap text-center" style="width:100%">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Precio</th>
                @can('tipo_habitacion.create')
                <th scope="col">Acciones</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @if (count($tipos) <= 0) <tr class="text-center">
                <td colspan="3">No hay Registros</td>
                </tr>
                @else
                @foreach ($tipos as $tipo)
                <tr>
                    <td>{{ $tipo->id }}</td>
                    <td>{{ $tipo->descripcion }}</td>
                    <td>{{ $tipo->precio }}</td>
                    @can('tipo_habitacion.create')
                    <td>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <form action="{{ route('tipoHabitaciones.edit', $tipo->id) }}"
                                    method="get"
                                    class="form-edit"
                                    >
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                                </form>
                            </div>
                            <div class="col-12 col-md-6">
                                <form action="{{ route('tipoHabitaciones.destroy', $tipo->id) }}"
                                    method="post"
                                    class="form-delete"
                                    >
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="/js/t-servicios.js"></script>
@stop