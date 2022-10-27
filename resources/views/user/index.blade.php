@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

<div>
    <div class="card-header">
        <h3>Usuarios</h3>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
@stop

@section('content')

<section class="container">
    <div class="header">
        <br>
        <table id="myTable" class="table table-light dt-responsive nowrap text-center" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Teléfono</th>
                    <th>Correo electrónico</th>
                    <th>Cargo</th>
                    <th style="text-align: center">I/H</th>
                    <th style="text-align: center">Editar</th>
                    <th style="text-align: center">Detalles</th>
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

                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
        <br>
    </div>
</section>
<div class="card-header">

    <form action="{{Route('user.create')}}" method="get">
        <button type="submit" class="btn btn-success">Registrar nuevo</button>
    </form>
</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>
<script>
    console.log('Hi!');

    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

<script>
    $('#myTable').DataTable({
        responsive: true,
        autoWidth: false,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontro lo que busca",
            "info": "Mostrando la pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar:",
            "paginate": {
                "next": "Siguiente",
                "previous": "Anterior"
            }

        }
    });
</script>
@stop