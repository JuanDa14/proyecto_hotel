@extends('adminlte::page')

@section('title', 'Nuevo proveedor')

@section('content')


<div class="container-fuild px-4 pt-4">
    <div class="row mb-4">
        <div class="col-12 col-md-6 text-md-left">
            <h3 class="text-red-500">Nuevo Proveedor</h3>
        </div>
        <div class="col-12 col-md-6 text-md-right">
            <a href="{{ route('proveedores.index') }}"><button type="button" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Volver</button></a>
        </div>
    </div>
    <form action="{{route('proveedores.store')}}" method="post" class="card shadow">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col form-group">
                    <label for="name">Nombres</label>
                    <input required type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingresar nombres" name="nombre">
                </div>

                <div class="col form-group">
                    <label for="name">Direccion</label>
                    <input required type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingresar apellidos" name="direccion">
                </div>
            </div>

            <div class="row">
                <div class="col-3 form-group">
                    <label for="name">Teléfono</label>
                    <input required type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingresar teléfono" name="telefono">
                </div>

                <div class="col-3 form-group">
                    <label for="exampleInputEmail1">Correo</label>
                    <input required type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingrese email" name="correo">
                </div>


                <div class="col-6 form-group">
                    <label for="exampleInputEmail1">Numero de estrellas</label>
                    <select name="estrellas" class="form-control" name="estrellas">
                        <option value="#" disabled selected>Seleccione la cantidad de estrellas</option>
                        <option value="1">1 estrella</option>
                        <option value="2">2 estrellas</option>
                        <option value="3">3 estrellas</option>
                        <option value="4">4 estrellas</option>
                        <option value="5">5 estrellas</option>
                    </select>
                </div>

            </div>

            <div>
                <button type="submit" style="float: right" class="btn btn-success">Guardar</button>
            </div>
        </div>
    </form>
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