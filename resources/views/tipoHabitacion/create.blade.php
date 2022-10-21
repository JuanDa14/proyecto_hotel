@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Registro Tipo Habitacion</h1>
</div>
@stop

@section('content')
<div class="card container">
    <div class="card-body">
        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label" for="descripcion">Descripcion</label>
                <input type="text" id="descripcion" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label" for="precio">Precio</label>
                <input type="text" id="precio" class="form-control">
            </div>
            <button class="btn btn-outline-primary">Guardar</button>
        </form>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop