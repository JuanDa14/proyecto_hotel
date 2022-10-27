@extends('adminlte::page')

@section('title', 'Usuario')

@section('content')

<section class="container-fluid pt-4">
    <div class="row mb-4">
        <div class="col-12 col-md-6 text-md-left">
            <h3 class="text-gray">Usuario</h3>
        </div>
        <div class="col-12 col-md-6 text-md-right">
            <a href="{{ route('user.index') }}"><button type="button" class="btn btn-success"><i class="fas fa-arrow-left"></i> Volver</button></a>
        </div>
    </div>

    <div class="d-flex card shadow p-3" style="display: flex; justify-content: center;">
        <div class="row mb-4">
            <div class="col-12 col-md-6 mt-5 w-100 mx-auto text-center d-flex aling-content-center justify-content-center">
                <img src="/img/hombre.png" alt="logo" style="width: 45%; height: 70%; ">

            </div>
            <div class="col-12 col-md-6 mx-auto d-flex flex-column aling-content-center">
                <div>
                    <h3 class="text-gray mb-3" style="font-weight: bold">Datos personales</h3>
                </div>
                <p class="text-gray" style="font-weight:bolder">Nombres: <span style="font-weight:normal" class="ml-2">{{$user->name}}</span> </p>
                <p class="text-gray" style="font-weight:bolder">Apellidos: <span style="font-weight:normal" class="ml-2">{{$user->apellidos}}</span></p>
                <p class="text-gray" style="font-weight:bolder">DNI: <span style="font-weight:normal" class="ml-2">{{$user->dni}}</span></p>
                <p class="text-gray" style="font-weight:bolder">Teléfono <span style="font-weight:normal" class="ml-2">{{$user->telefono}}</span></p>
                <p class="text-gray" style="font-weight:bolder">Direccion: <span style="font-weight:normal" class="ml-2">{{$user->direccion}}</span></p>
                <p class="text-gray" style="font-weight:bolder">Genero: <span style="font-weight:normal" class="ml-2">{{$user->genero}}</span></p>
                <p class="text-gray" style="font-weight:bolder">Nacimiento: <span style="font-weight:normal" class="ml-2">{{$user->fechanacimiento}}</span></p>
                <p class="text-gray" style="font-weight:bolder">Email: <span style="font-weight:normal" class="ml-2">{{$user->email}}</span></p>
                <p class="text-gray" style="font-weight:bolder">Estado: <span style="font-weight:normal" class="ml-2">{{$user->estado}}</span></p>
            </div>
        </div>
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