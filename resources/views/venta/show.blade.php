@extends('adminlte::page')

@section('title', 'Ventas')

@section('content_header')
@stop

@section('content')

    <div class="container-fluid pt-4">
        <div class=" card">
            <div class="card-header">
                <div class="row text-center">
                    <div class="col-12 col-md-6">
                        <div>
                            <h2 style="font-weight: bold;">P. Pimentel</h2>
                            <h5>Fecha : {{ date('d-m-y', strtotime($boleta->created_at)) }}</h5>
                            <h5>Pasteleria - C.C. Centro Lima Av. Bolivia 148 Int 552 553 Central (01) 425 - 1191</h5>
                        </div>
                    </div>
                    <div class="col-12 col-md-6" style="border: 1px solid ">
                        <h5>R.U.C. {{ $idboleta * 365249 }}</h5>
                        <h5>BOLETA DE VENTA</h5>
                        <label class="h4">Numero de venta : <span class="h3">{{ $idboleta }}</span></label>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-12 col-md-6 ">
                        <p class="h4">Cliente : <span class="h4">{{ $cliente }}</span></p>
                    </div>
                    <div class="col-12 col-md-6">
                        <p class="h4">Vendedor : <span class="h4">{{ $vendedor->nombre }}
                                {{ $vendedor->apellidos }}</span></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-12">
                        <table class="table mt-3 text-center">
                            <thead class="thead">
                                <tr>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Importe x Producto</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < count($ArrayProductos); $i++)
                                    <tr>
                                        <td>{{ $ArrayProductos[$i] }}</td>
                                        <td>{{ $Arraycantidades[$i] }}</td>
                                        <td>{{ $ArrayPrecio[$i] }}</td>
                                        <td>S/{{ $ArrayImporte[$i] }}</td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="text-right">
                    <p class="h5 mt-4">Importe Total : <span class="h5">S/{{ $importeTotal }}</span></p>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('imprimir', $idboleta) }}" class="btn btn-primary">Descargar</a>
                    <a href="{{ route('ventas.index') }}" class="btn btn-danger">Volver</a>
                </div>
            </div>
        @stop

        @section('js')
            <script src="/js/domLoaded.js"></script>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            @if (session('realizada') === 'OK')
        <script>
             Swal.fire(
                'Realizada!',
                'La venta ha sido realizada correctamente.',
                'success'
                )
        </script>
             @endif
        @stop