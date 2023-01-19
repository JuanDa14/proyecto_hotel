@extends('adminlte::page')

@section('title', 'Servicios Adicionales')

@section('content')
<div class="container-fluid pt-4">
    <div class="row">
        <div class="col-12 col-md-6 text-md-left">
            <h3 class="text-gray">Servicios Adicionales</h3>
        </div>
        @can('admin.dashboard')
        <div class="col-12 col-md-6 text-md-right">
            <a href="{{ route('servicios.create') }}" class="btn btn-success">
                <i class="fas fa-plus-circle"></i>
                Nuevo Servicio
            </a>
        </div>
        @endcan
    </div>
    <div class="mt-4">
        <table id="datatable" class="table table-light dt-responsive nowrap text-center">
            <thead>
                <th>ID</th>
                <th>Descripcion</th>
                @can('admin.dashboard')
                <th>Acciones</th>
                @endcan
            </thead>
            <tbody>
                @foreach ($services as $service)
                <tr>
                    <td>{{ $service->id }}</td>
                    <td>{{ $service->descripcion }}</td>
                    @can('admin.dashboard')
                    <td>
                        <div class="container d-flex justify-content-center">
                            <form action="{{ route('servicios.edit', $service->id) }}" method="get" class="mr-1 form-edit">
                                <button class="btn btn-primary"><i class="fas fa-edit"></i> Modificar</button>
                            </form>
                            <form action="{{ route('servicios.destroy', $service->id) }}" method="post" class="form-delete">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger"><i class="fas fa-trash"></i> Eliminar</button>
                            </form>
                        </div>
                    </td>
                    @endcan
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
<link rel="stylesheet" href="sweetalert2.min.css">
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