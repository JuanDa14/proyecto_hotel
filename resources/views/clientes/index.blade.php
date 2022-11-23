@extends('adminlte::page')

@section('title', 'Clientes')

@section('content')

<section class="container-fuild pt-4">
    <div class="row mb-4">
        <div class="col-12 col-md-6 text-md-left">
            <h3 class="text-gray">Clientes</h3>
        </div>
        <!-- //TODO agregar permisos -->
        <!-- @can('user.create') -->
        <div class="col-12 col-md-6 text-md-right">
            <a href="{{ route('clientes.create') }}"><button type="button" class="btn btn-success"><i class="fas fa-plus-circle"></i> Nuevo Cliente</button></a>
        </div>
        <!-- @endcan -->
    </div>
    <div class="header">
        <br>
        <table id="datatable" class="table table-light dt-responsive nowrap text-center" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Dni</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($clientes as $c)
                <tr>
                    <td>{{$c->id}}</td>
                    <td>{{$c->dni}}</td>
                    <td class="col-2">{{$c->nombres}}</td>
                    <td>{{$c->telefono}}</td>
                    //TODO
                    <!-- @can('user.create') -->
                    <td style="text-align: center;display: flex;align-items: center;">
                        <form action="{{route('clientes.edit',$c->id)}}" method="get" class="elimina">
                            @csrf
                            <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                        </form>
                        <form action="{{route('clientes.show',$c->id)}}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-danger"><i class="fas fa-destroy"></i></button>
                        </form>
                    </td>

                    <!-- @endcan -->

                </tr>
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
    $('.inabilitar-proveedor').submit(function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Inabilitar al proveedor?',
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

    $('.habilitar-proveedor').submit(function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Habilitar al proveedor?',
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