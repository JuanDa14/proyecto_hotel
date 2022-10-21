@extends('adminlte::page')

@section('title', 'Listas de compra')

@section('content_header')
@stop

@section('content')

    <div class="container-fluid pt-4">
        <div class=" card">
            <div class="card-header">
                <div class="row text-center">
                    <div class="col-12 col-md-6 text-md-left">
                        <h5>Ordenes de compra</h5>
                    </div>
                    <div class="col-12 col-md-6 text-md-right">
                        <a href="{{ route('ordencompras.create') }}">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-plus-circle"></i> Nueva Orden de Compra
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="datatable" class="table table dt-responsive nowrap text-center" style="width:100%">
                    <thead>
                        <tr>
                            <td scope="col">Numero de compra</td>
                            <td scope="col">Fecha</td>
                            <td scope="col">Proveedora</td>
                            <td scope="col">Monto</td>
                            <td scope="col">Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ordenCompras as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                <td>{{ $item->proveedora }}</td>
                                <input type="hidden" value="{{$item->monto}}" id="inputMonto{{$item->id}}">
                                @if ($item->proveedora === 'No Especificada')
                                <td>---</td>    
                                @else                                
                                <td>{{ $item->monto }}</td>    
                                @endif

                                <td>
                                    <div class="row">
                                        <div class="col-12 col-md-4"> <a class="btn btn-success edit"><i
                                            class="fas fa-edit"></i></a></div>
                                            @if ($item->monto != 0 && $item->proveedora != 'No Especificada')
                                            <div class="col-12 col-md-4">
                                                <a href="{{ route('imprimirOrdenCompra', $item->id) }}"><button type="submit"
                                                        class="btn btn-primary"><i class="fas fa-print"></i></button></a>
                                            </div>
                                            @else
                                            <div class="col-12 col-md-4">
                                               <form action="" class="imprimir">
                                                <button type="submit"
                                                class="btn btn-danger"><i class="fas fa-print"></i></button>
                                               </form>
                                            </div>                                            
                                            @endif
                                        <div class="col-12 col-md-4">
                                            <a href="{{ route('ordencompras.show', $item->id) }}"><button type="submit"
                                                    class="btn btn-warning"><i class="fas fa-info-circle"></i></button></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        <!-- Modal EDITAR -->
        <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Orden de Compra</h5>
                    </div>
                    <div class="modal-body">
                        <form action="/ordencompras" method="post" id="editform" class="realizar">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label for="idproveedora" class="col-form-label">Nombre de la Proveedora:</label>
                                <input type="text" class="form-control" id="idproveedora" name="txtproveedora" required>
                            </div> 
                            <div class="mb-3">
                                <label for="idmonto" class="col-form-label">Monto</label>
                                <input type="number" class="form-control" id="idmonto" name="txtmonto" required>
                            </div>    
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>                                               
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- TERMINA MODAL EDITAR --}}
@stop
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
</script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>
    <script src="/js/dataTable.js"></script>
    <script src="/js/domLoaded.js"></script>
    <script src="/js/ordenCompra.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.imprimir').submit(function(e) {
            e.preventDefault();
            Swal.fire(
                'Opción no valida',
                'La orden de compra aún tiene datos incompletos',
                'error'
                )
            });
   </script>
    @if (session('validada') === 'OK')
<script>
     Swal.fire(
        'Validada!',
        'La orden de compra ha sido validada correctamente.',
        'success'
        )
</script>
    @endif

    @if (session('problema') === 'OK')
    <script>
         Swal.fire(
            'Hubo un problema!',
            'Complete los campos correctamente.',
            'info'
            )
    </script>
        @endif

    @if (session('rechazada') === 'OK')
     <script>
          Swal.fire(
             'Rechazada!',
             'La orden de compra ha sido rechazada correctamente.',
             'error'
             )
     </script>
     @endif

     @if (session('archivada') === 'OK')
     <script>
          Swal.fire(
             'Archivada!',
             'La orden de compra ha sido archivada correctamente.',
             'success'
             )
     </script>
     @endif
@stop
