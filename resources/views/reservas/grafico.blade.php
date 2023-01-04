@extends('adminlte::page')

@section('title', 'Grafico de Reservas')

@section('content_header')
@stop
@section('content')
    <div class="container-fluid p-4 ">
        <div class="card card-primary">
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-12 col-md-6 mt-3">
                        <label class="fs-5">Grafico de reservas por mes</label>
                        <canvas id="myChart" width="400" height="400"></canvas>
                    </div>
                    <div class="col-12 col-md-6 mt-3">
                        <label class="fs-5 ">Especificaciones</label>                     
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Mes</th>
                                        <th>Reservas Realizadas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @for($i = 0; $i < count($data); $i++)   
                                   <tr>
                                    <td>{{$meses[$i]}}</td>
                                    <td>{{$data[$i]}}</td>
                                </tr>
                                   @endfor                
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="/js/domLoaded.js"></script>
    @php
        $contador = 0;
    @endphp
    @foreach ($data as $item)
    <input type="hidden" value="{{$item}}" id="cantidad{{$contador}}">
    @php
        $contador++
    @endphp
    @endforeach
    <script>
        let arrayCantidad = [];
        let cantidad;
        let contador = 0;
        for (let i = 0; i < 12; i++) {
        cantidad = document.getElementById(`cantidad${contador}`).value;
        arrayCantidad.push(cantidad);
        localStorage.setItem('data',JSON.stringify(arrayCantidad));  
        contador++;  
        }
    </script>
    <script src="/js/grafico.js"></script>   
@stop