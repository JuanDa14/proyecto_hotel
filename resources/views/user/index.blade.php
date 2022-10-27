@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content')

<section class="container-fuild pt-4">
    <div class="row mb-4">
        <div class="col-12 col-md-6 text-md-left">
            <h3 class="text-gray">Usuarios</h3>
        </div>
        @can('user.create')
        <div class="col-12 col-md-6 text-md-right">
            <a href="{{ route('user.create') }}"><button type="button" class="btn btn-success"><i class="fas fa-plus-circle"></i> Registrar usuario</button></a>
        </div>
        @endcan
    </div>
    <div class="header">
        <br>
        <table id="datatable" class="table table-light dt-responsive nowrap text-center" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Teléfono</th>
                    <th>Correo electrónico</th>
                    <th>Cargo</th>
                    @can('user.create')
                    <th style="text-align: center">I/H</th>
                    <th style="text-align: center">Editar</th>
                    <th style="text-align: center">Detalles</th>
                    @endcan
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $v)
                @if ($v->estado=="ACTIVO")
                <tr>
                    <td>{{$v->id}}</td>
                    <td>{{$v->nombre}}</td>
                    <td class="col-2">{{$v->apellidos}}</td>
                    <td>{{$v->telefono}}</td>
                    <td>{{$v->email}}</td>
                    <td>{{$v->name}}</td>
                    @can('user.create')
                    <td style="text-align: center">
                        <form action="{{route('inhabilitar',$v->id)}}" method="get">
                            @if ($v->estado =="ACTIVO")
                            <button type="submit" class="btn btn-secondary">Inh</button>
                            @else
                            <button type="submit" class="btn btn-secondary">Hab</button>
                            @endif
                        </form>
                    </td>
                    <td style="text-align: center">
                        <form action="{{route('user.edit',$v->id)}}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                        </form>
                    </td>

                    <td style="text-align: center">
                        <form action="{{route('user.show',$v->id)}}" method="get">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-info"><i class="fas fa-info"></i></button>
                        </form>
                    </td>
                    @endcan

                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
        <br>
    </div>
</section>
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