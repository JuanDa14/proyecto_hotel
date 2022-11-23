@extends('adminlte::page')

@section('title', 'Editar Proveedor')

@section('content')
<div class="container-fuild px-4 pt-4">
    <div class="row mb-4">
        <div class="col-12 col-md-6 text-md-left">
            <h3 class="text-gray">Proveedor</h3>
        </div>
        <div class="col-12 col-md-6 text-md-right">
            <a href="{{ route('proveedores.index') }}"><button type="button" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Volver</button></a>
        </div>
    </div>
    <form action="{{route('proveedores.update',$proveedor->id)}}" method="post" class="card shadow guardar-proveedor">
        @csrf
        {{method_field('PUT')}}
        <div class="card-body">
            <div class="row">
                <div class="col form-group">
                    <label for="name">Nombres</label>
                    <input value="{{$proveedor->nombre}}" required type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingresar nombres" name="nombre">
                </div>

                <div class="col form-group">
                    <label for="name">Direccion</label>
                    <input value="{{$proveedor->direccion}}" required type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingresar apellidos" name="direccion">
                </div>
            </div>

            <div class="row">
                <div class="col-3 form-group">
                    <label for="name">Teléfono</label>
                    <input value="{{$proveedor->telefono}}" required type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingresar teléfono" name="telefono">
                </div>

                <div class="col-3 form-group">
                    <label for="exampleInputEmail1">Correo</label>
                    <input value="{{$proveedor->correo}}" required type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingrese email" name="correo">
                </div>


                <div class="col-6 form-group">
                    <label for="exampleInputEmail1">Numero de estrellas</label>
                    <select class="form-control" aria-label="Default select example" name="estrellas" class="form-control" required>
                        <option disabled selected value="">Seleccione la cantidad de estrellas</option>
                        @if ($proveedor->estrellas == 1)
                        <option selected value="1">1 estrella</option>
                        @endif
                        @if ($proveedor->estrellas == 2)
                        <option selected value="2">2 estrellsa</option>
                        @endif
                        @if ($proveedor->estrellas == 3)
                        <option selected value="3">3 estrellas</option>
                        @endif
                        @if ($proveedor->estrellas == 4)
                        <option selected value="4">4 estrellas</option>
                        @endif
                        @if ($proveedor->estrellas == 5)
                        <option selected value="5">5 estrellas</option>
                        @endif
                    </select>
                </div>

            </div>

            <div>
                <button type="submit" style="float: right" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </form>

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

<script>
    $('.guardar-proveedor').submit(function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Guardar cambios?',
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