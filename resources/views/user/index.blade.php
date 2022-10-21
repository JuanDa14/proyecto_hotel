@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content')
<div class="container-fuild pt-4">
    <div class="row mb-4">
        <div class="col-12 col-md-6 text-md-left">
            <h3 class="text-gray">Usuarios</h3>
        </div>
        <div class="col-12 col-md-6 text-md-right">
            <a href="{{ route('user.create') }}"><button type="button" class="btn btn-success"><i class="fas fa-plus-circle"></i> Crear usuario</button></a>
        </div>
    </div>
    <table id="datatable" class="table dt-responsive nowrap text-center" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th style="text-align: center">Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $u)
            <tr>
                <td>{{$u->id}}</td>
                <td>{{$u->name}}</td>
                <td>{{$u->email}}</td>
                <td>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <form action="{{ route('user.edit', $u->id) }}" method="get">
                                @csrf
                                <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                            </form>
                        </div>
                        <div class="col-12 col-md-6">
                            <form action="{{ route('user.destroy', $u->id) }}" method="post" class="eliminar">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </td>



            </tr>

            @endforeach
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