@extends('adminlte::page')

@section('title', 'Pedidos')

@section('content')

<section class="container-fuild pt-4">
    <div class="row mb-4">
        <div class="col-12 col-md-6 text-md-left">
            <h3 class="text-gray">Pedidos</h3>
        </div>
        <!-- //TODO agregar permisos -->
        {{-- <!-- @can('user.create') --> --}}
        <div class="col-12 col-md-6 text-md-right">
            <a href="{{ route('pedidos.create') }}"><button type="button" class="btn btn-success"><i class="fas fa-plus-circle"></i> Nuevo Pedido</button></a>
        </div>
        {{-- <!-- @endcan --> --}}
    </div>
    <div class="header">
        <br>
        <table id="datatable" class="table table-light dt-responsive nowrap text-center" style="width:100%">
            <thead>
                <tr>
                    <td scope="col">Numero de pedido</td>
                    <td scope="col">Fecha Pedido</td>
                    <td scope="col">Fecha Entrega</td>
                    <td scope="col">Proveedor</td>
                    <td scope="col">Total</td>
                    {{-- <td scope="col">Acciones</td> --}}
                </tr>
            </thead>

            <tbody>
                @foreach ($pedidos as $p)
                <tr>
                    <td>{{$p->id}}</td>
                    <td>{{$p->fechapedido}}</td>
                    <td>{{$p->fechaentrega}}</td>
                    <td>{{$p->nombre}}</td>
                    <td>{{$p->total}}</td>

                    {{-- <td>{{$r->tipoPago}}</td> --}}

                    <!-- //TODO agregar can -->

                    {{-- <td style="text-align: center;display: flex;" class="d-flex justify-content-between"> --}}
                        {{-- <form action="{{ route('imprimir-reserva', $r->id) }}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-primary"><i class="fas fa-download"></i></button>
                        </form> --}}
                        {{-- <form action="{{route('reservas.show',$r->id)}}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-info"><i class="fas fa-info"></i></button>
                        </form> --}}
                    {{-- </td> --}}


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