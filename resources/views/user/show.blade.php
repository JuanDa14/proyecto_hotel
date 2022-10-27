@extends('adminlte::page')

@section('title', 'Usuario')

@section('content')
<div class="row col-12">

    <div class="row" style="margin-left: 7%;">
        <div id="div1" class="col-6">
            <div>Nombres: </div>
            <div>Apellidos:</div>
            <div>DNI: </div>
            <div>Teléfono:</div>
        </div>

        <div class="col-6">
            <div>{{$vendedor->name}}</div>
            <div>{{$vendedor->apellidos}}</div>
            <div>{{$vendedor->dni}}</div>
            <div>{{$vendedor->telefono}}</div>
        </div>
    </div>



    <div class="row" style="margin-left: 7%;">
        <div id="div1" class="col-6">
            <div>Direccion: </div>
            <div>Genero:</div>
            <div>Nacimiento: </div>
            <div>Email:</div>
        </div>

        <div class="col-6">
            <div>{{$vendedor->direccion}}</div>
            <div>{{$vendedor->genero}}</div>
            <div>{{$vendedor->fechanacimiento}}</div>
            <div>{{$vendedor->email}}</div>
        </div>
    </div>

    <div class="row" style="align-items: center;margin-left: 10%; text-align: center">
        @if ($vendedor->estado == "ACTIVO")
        <h3>Estado: ACTIVO </h3>
        @else
        <h3>Estado: INACTIVO </h3>
        @endif
    </div>
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