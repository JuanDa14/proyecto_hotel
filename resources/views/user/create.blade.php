@extends('adminlte::page')

@section('title', 'Registrar usuario')

@section('content')


<div class="container-fuild px-4 pt-4">
    <div class="row mb-4">
        <div class="col-12 col-md-6 text-md-left">
            <h3 class="text-gray">Nuevo Usuario</h3>
        </div>
        <div class="col-12 col-md-6 text-md-right">
            <a href="{{ route('user.index') }}"><button type="button" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Volver</button></a>
        </div>
    </div>
    <form action="{{route('user.store')}}" method="post" class="card shadow">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col form-group">
                    <label for="name">Nombres</label>
                    <input required type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingresar nombres" name="txtnombres">
                </div>

                <div class="col form-group">
                    <label for="name">Apellidos</label>
                    <input required type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingresar apellidos" name="txtapellidos">
                </div>
            </div>

            <div class="row">
                <div class="col-3 form-group">
                    <label for="name">Teléfono</label>
                    <input required type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingresar teléfono" name="txttelefono">
                </div>

                <div class="col-3 form-group">
                    <label for="exampleInputEmail1">DNI</label>
                    <input required type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingrese email" name="txtdni">
                </div>

                <div class="col-3 form-group">
                    <div class="col">
                        <div class="row">
                            <label for="exampleInputEmail1">Género</label>
                        </div>
                        <div class="row">

                            <div class="col-2">
                                <input required type="radio" id="contactChoice1" name="txtgenero" value="M">
                            </div>

                            <div class="col"> <label for="contactChoice1">M</label>
                            </div>

                            <div class="col-2">
                                <input required type="radio" id="contactChoice2" name="txtgenero" value="F">
                            </div>

                            <div class="col">
                                <label for="contactChoice2">F</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-3 form-group">
                    <label for="exampleInputEmail1">Fecha de nacimiento</label>
                    <input required type="date" class="form-control" id="exampleInputEmail1" placeholder="Ingrese email" name="txtfechanacimiento">
                </div>
            </div>

            <div class="row">
                <div class="col form-group">
                    <label for="exampleInputEmail1">Dirección</label>
                    <input required type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingrese dirección" name="txtdireccion">
                </div>
                <div class="col form-group">
                    <label for="exampleInputEmail1">Correo electrónico</label>
                    <input required type="email" class="form-control" id="exampleInputEmail1" placeholder="Ingrese email" name="txtcorreo">
                </div>
                <div class="col form-group">
                    <label for="exampleInputEmail1">Cargo</label>
                    <select class="form-control" name="cargo" id="cargo">
                        @foreach ($cargos as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
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