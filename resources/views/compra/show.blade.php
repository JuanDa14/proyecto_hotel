@extends('adminlte::page')

@section('title', 'Compras')

@section('content_header')
@stop

@section('content')

    <div class="container-fluid pt-4">
        <div class=" card">
            <div class="card-header">
                <div class="row text-center">
                    <div class="col-12 col-md-6">
                        <div>
                        <label class="h1">ORDEN DE COMPRA</label><br>
                            <h5>Fecha : {{ date('d-m-y', strtotime($compra->created_at)) }}</h5>
                            <h5>Pasteleria - C.C. Centro Lima Av. Bolivia 148 Int 552 553 Central (01) 425 - 1191</h5>
                        </div>
                    </div>
                    <div class="col-12 col-md-6" style="border: 1px solid ">
                        <label class="h5">Pasteleria Pimentel</label><br>
                        <label class="h5">Numero de orden de compra : <span class="h5">{{ $idcompra }}</span></label><br>
                        <label class="h5">Proveedora : <span class="h5">{{ $compra->proveedora }}</span></label><br>
                        <label class="h5">Estado : <span class="h5">{{ $compra->estado }}</span></label><br>                        
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <table class="table mt-3 text-center">
                            <thead class="thead">
                                <tr>
                                    <th scope="col">Insumos</th>
                                    <th scope="col">Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < count($ArrayInsumos); $i++)
                                    <tr>
                                        <td>{{ $ArrayInsumos[$i] }}</td>
                                        <td>{{ $Arraycantidades[$i] }}</td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>               
            </div>
            <div class="card-footer">
               @if ($compra->estado === 'Armado')
               <div class="d-flex justify-content-between">
                   <a href="{{ route('validar', $idcompra) }}" class="btn btn-primary"><i class="fas fa-check"></i> Validar</a>
                   <a href="{{ route('cancelar',$idcompra) }}" class="btn btn-danger"><i class="fas fa-ban"></i> Cancelar</a>             
                </div>
               @endif
               @if ($compra->estado === 'Validado')
               <div class="d-flex justify-content-end">
               <a href="{{ route('ordencompras.index') }}" class="btn btn-danger">Volver</a>                    
           </div>                                    
               @endif
               @if ($compra->estado === 'Archivada')
               <div class="d-flex justify-content-between">
                   <a href="{{ route('imprimirOrdenCompra', $idcompra) }}" class="btn btn-success">Descargar</a>
                   <a href="{{ route('ordencompras.index') }}" class="btn btn-danger">Volver</a>                    
           </div>                                    
               @endif
            </div>
        @stop
        @section('js')
            <script type="/js/domLoaded.js"></script>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            @if (session('registrada') === 'OK')
        <script>
             Swal.fire(
                'Registrada!',
                'La orden de compra se registro correctamente.',
                'success'
                )
        </script>
             @endif
        @endsection