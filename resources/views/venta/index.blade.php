@extends('adminlte::page')

@section('title', 'Ventas')

@section('content_header')
@stop

@section('content')

    <div class="container-fluid pt-4">
        <div class=" card">
            <div class="card-header">
                <div class="row text-center">
                    <div class="col-12 col-md-6 text-md-left">
                        <h5>Ventas</h5>
                    </div>
                    <div class="col-12 col-md-6 text-md-right">
                        <a href="{{ route('ventas.create') }}">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-plus-circle"></i> Nueva Venta
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="datatable" class="table table dt-responsive nowrap text-center" style="width:100%">
                    <thead>
                        <tr>
                            <td scope="col">Numero de venta</td>
                            <td scope="col">Fecha</td>
                            <td scope="col">Cliente</td>
                            <td scope="col">Empleado</td>
                            <td scope="col">Tipo de Pago</td>
                            <td scope="col">Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ventas as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                <td>{{ $item->nombres }}</td>
                                <td>{{ $item->nombre }} {{$item->apellidos}}</td>
                                <td>{{ $item->tipoPago }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <a href="{{ route('imprimir', $item->id) }}"><button type="submit"
                                                    class="btn btn-primary"><i class="fas fa-print"></i></button></a>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <a href="{{ route('ventas.show', $item->id) }}"><button type="submit"
                                                    class="btn btn-success"><i class="fas fa-info-circle"></i></button></a>
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
@stop
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>
    <script src="/js/dataTable.js"></script>
    <script src="/js/domLoaded.js"></script>    
@stop
