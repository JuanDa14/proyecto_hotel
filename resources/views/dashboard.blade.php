@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard</h1>
@stop

@section('content')
<div class="container pb-4">
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>Reservas</h3>
                    <h4>{{ $reservas }}</h4>
                    <p>Reservas registradas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-money-bill"></i>
                </div>
                <a href="{{ route('reservas.index') }}" class="small-box-footer">
                    Más información <i class="fas fa-arrow-alt-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>Clientes</h3>
                    <h4>{{ $clientes }}</h4>
                    <p>Clientes registrados</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-friends"></i>
                </div>
                <a href="{{ route('clientes.index') }}" class="small-box-footer">
                    Más información <i class="fas fa-arrow-alt-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>Proveedores</h3>
                    <h4>{{ $proveedores }}</h4>
                    <p>Proveedores registrados</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <a href="{{ route('proveedores.index') }}" class="small-box-footer">
                    Más información <i class="fas fa-arrow-alt-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>Usuarios</h3>
                    <h4>{{ $usuarios }}</h4>
                    <p>Clientes registrados</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-friends"></i>
                </div>
                <a href="{{ route('user.index') }}" class="small-box-footer">
                    Más información <i class="fas fa-arrow-alt-circle-right"></i>
                </a>
            </div>
        </div>


    </div>

    <div class="row mt-4">
        <div class="col">
            <canvas id="myChart"></canvas>
        </div>
        <div class="col">
            <div class="row mt-4">
                <div class="col-12">
                    <div class="info-box mb-3 bg-success">
                        <span class="info-box-icon"><i class="fas fa-dollar-sign"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Ingresos Total</span>
                            <span class="info-box-number">S/ {{$ingresos}}</span>
                        </div>

                    </div>
                </div>

                <div class="col-12">
                    <div class="info-box mb-3 bg-primary">
                        <span class="info-box-icon"><i class="fas fa-dollar-sign"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Costos Totales</span>
                            <span class="info-box-number">S/ {{$costos}}</span>
                        </div>

                    </div>
                </div>
                <div class="col-12">
                    <div class="info-box mb-3 bg-secondary">
                        <span class="info-box-icon"><i class="fas fa-clipboard"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Usuario que Realizó más Reservaciones</span>

                            @foreach ($usermasRes as $item)
                            {{ $item->name }} {{ $item->apellidos }}
                            <span class="info-box-number">{{ $item->user_count }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


@php
$contador = 0;
@endphp

@foreach ($data as $item)
<input type="hidden" value="{{ $item }}" id="cantidad{{ $contador }}">
@php
$contador++;
@endphp
@endforeach

<script>
    let arrayQty = []
    let cantidad
    let contador = 0

    for (let i = 0; i < 12; i++) {
        cantidad = document.getElementById(`cantidad${contador}`).value;
        arrayQty.push(cantidad);
        localStorage.setItem('data', JSON.stringify(arrayQty));
        contador++;
    }
</script>


<script src="/js/dashboard.js"></script>
@endsection