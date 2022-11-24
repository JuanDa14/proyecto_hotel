@extends('adminlte::page')

@section('title', 'Editar cliente')

@section('content')


<div class="container-fuild px-4 pt-4">
    <div class="row mb-4">
        <div class="col-12 col-md-6 text-md-left">
            <h3 class="text-red-500">Editar Cliente</h3>
        </div>
        <div class="col-12 col-md-6 text-md-right">
            <a href="{{ route('clientes.index') }}"><button type="button" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Volver</button></a>
        </div>
    </div>
    <form action="{{route('clientes.update',$cliente->id)}}" method="post" class="card shadow actualizar">
        @method('PUT')
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-6 form-group">
                    <label for="name">Nombres</label>
                    <input value="{{$cliente->nombres}}" required type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingresar sus nombres" name="nombres">
                </div>

                <div class="col-6 form-group">
                    <label for="name">Dni</label>
                    <input value="{{$cliente->dni}}" required type="number" class="form-control" id="exampleInputEmail1" placeholder="Ingresar su DNI" name="dni">
                </div>
            </div>

            <div class="row">
                <div class="col-4 form-group">
                    <label for="name">Telefono</label>
                    <input value="{{$cliente->telefono}}" required type="number" class="form-control" id="exampleInputEmail1" placeholder="Ingresar sus apellidos" name="telefono">
                </div>

                <div class="col-4 form-group">
                    <label for="name">Direccion</label>
                    <input value="{{$cliente->direccion}}" required type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingresar su direccion" name="direccion">
                </div>

                <div class="col-4 form-group">
                    <div class="col">
                        <div class="row">
                            <label for="exampleInputEmail1">Género</label>
                        </div>
                        <div class="row">

                            <div class="col-1">
                                <input required @if ($cliente->genero =="M") checked @endif type="radio" id="contactChoice1" name="genero" value="M">
                            </div>

                            <div class="col-5">
                                <label for="contactChoice1">Masculino</label>
                            </div>

                            <div class="col-1">
                                <input required @if ($cliente->genero =="F") checked @endif type="radio" id="contactChoice2" name="genero" value="F">
                            </div>

                            <div class="col-5">
                                <label for="contactChoice2">Femenino</label>
                            </div>
                        </div>
                    </div>
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


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $('.actualizar').submit(function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Guardar al cliente?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        })
    });
</script>

@stop