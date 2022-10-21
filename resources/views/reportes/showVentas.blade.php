a
@extends('adminlte::page')

@section('title', 'Reportes')

@section('content_header')
@stop

@section('content')
<div class="container"><br>
            <div class="card">                 
            <p class="h5 card-header text-center ">
            Detalle reporte de Ventas
            </p>
            <div class="card-body">
                    <label for="">Año: {{$a}}</label><br>
                    <label for="">Mes: {{$meses[$m-1]}} </label><br>
                    <label for="">Importe:  S/.{{$cantidad[0]->importe}}</label>
                
                <table class="table table-light mt-2 text-center" id="tabla">
                    <thead class="thead-light">
                        <tr>
                            <th>Empleado</th>
                            <th>Cliente</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Importe</th>
                            <th>Fecha de Venta</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ventas as $item)
                            <tr>
                                <td>{{$item->empleado}}</td>
                                <td>{{$item->cliente}}</td>
                                <td>{{$item->producto}}</td>
                                <td>{{$item->cantidad}}</td>
                                <td>{{$item->importe}}</td>
                                <td>{{$item->Fecha}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>    
            <div class="card-footer">
                <a class="btn btn-danger" href="{{route('reporteventa')}}">Volver</a>
            </div>
        </div>
        </div>
@endsection
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection
@section('js')
<script src="/js/domLoaded.js"></script>   
@endsection
