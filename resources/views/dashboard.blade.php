@extends('adminlte::page')

@section('title', 'Inicio | Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="row">
                    @can('ver.dashboard')
                    <div class="col-12 col-md-6">
                     <div class="small-box bg-info">
                         <div class="inner">
                             <h3>{{ $numv }}</h3>
                             <p>Ventas Realizadas</p>
                         </div>
                         <div class="icon">
                             <i class="ion ion-bag"></i>
                         </div>
                         <a href="{{ route('ventas.index') }}" class="small-box-footer">Mas informacion <i
                                 class="fas fa-arrow-circle-right"></i></a>
                     </div>
                 </div>
               <div class="col-12 col-md-6">
                 <div class="small-box bg-warning">
                     <div class="inner">
                       <h3>{{$numoc}}</h3>
                       <p>Ordenes de Compra Realizadas</p>
                     </div>
                     <div class="icon">
                         <i class="fas fa-cart-arrow-down"></i>
                     </div>
                     <a href="{{route('ordencompras.index')}}" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
                   </div>
               </div>
            </div>
            <div class="row">
                 @endcan
                 @can('ver.empleado')
                 <div class="col-12 col-md-6">
                     <div class="small-box bg-success">
                         <div class="inner">
                             <h3>{{ $nume }}</h3>
                             <p>Empleados Registrados</p>
                         </div>
                         <div class="icon">
                             <i class="fas fa-user"></i>
                         </div>
                         <a href={{ route('empleados.index') }} class="small-box-footer">Mas informacion <i
                                 class="fas fa-arrow-circle-right"></i></a>
                     </div>
                 </div>
                 @endcan
                 @can('ver.producto')
                 
                 <div class="col-12 col-md-6">
                  <div class="small-box bg-danger">
                      <div class="inner">
                          <h3>{{ $nump }}</h3>
                          <p>Productos registrados</p>
                      </div>
                      <div class="icon">
                          <i class="fas fa-archive"></i>
                      </div>
                      <a href="{{ route('productos.index') }}" class="small-box-footer">Mas informacion <i
                              class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
                 @endcan                      
                        </div>                 
            </div>
           @can('ver.dashboard')
           <div class="col-12 col-md-6">
            <canvas id="myChart"></canvas>  
            </div>
           @endcan
        </div>
     @can('ver.dashboardCompleto')
     <div class="row">
      <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-header border-transparent">
              <h3 class="card-title">Últimas compras</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table m-0 text-center">
                  <thead>
                  <tr>
                    <th>Orden ID</th>
                    <th>Proveedora</th>
                    <th>Estado</th>
                    <th>Accion</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach ($ordenCompras as $item)
                      <tr>
                        <td><a>{{$item->id}}</a></td>
                        <td>{{$item->proveedora}}</td>
                        <td>
                            @if ($item->estado === 'Archivada')
                            <span class="badge badge-success">{{$item->estado}}</span>
                            @endif                               
                            @if ($item->estado === 'Validado')
                            <span class="badge badge-warning">{{$item->estado}}</span>                                                           
                            @endif
                            @if ($item->estado === 'Invalida')                                
                            <span class="badge badge-danger">{{$item->estado}}</span>                                                                
                            @endif
                        </td>
                        <td>
                          <div class="sparkbar"><a class="btn btn-primary" href="{{route('ordencompras.show',$item->id)}}"><i class="fas fa-eye"></i></a></div>
                        </td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer clearfix">
              <a href="{{route('ordencompras.create')}}" class="btn btn-sm btn-info float-left">Realizar nuevo pedido</a>
              <a href="{{route('ordencompras.index')}}" class="btn btn-sm btn-secondary float-right">Ver todos los pedidos</a>
            </div>
          </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="info-box mb-3 bg-warning">
            <span class="info-box-icon"><i class="fas fa-clipboard"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Reportes totales</span>
              <span class="info-box-number"></span>
            </div>
          </div>
          <div class="info-box mb-3 bg-success">
            <span class="info-box-icon"><i class="fas fa-dollar-sign"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Ganancia Total</span>
                <span class="info-box-number">S/ {{$ganancias}}</span>
            </div>
          </div>
          <div class="info-box mb-3 bg-danger">
            <span class="info-box-icon"><i class="fas fa-thumbs-down"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Gasto Total</span>
                <span class="info-box-number">S/ {{$impuestos}}</span>
            </div>
          </div>
          <div class="info-box mb-3 bg-info">
            <span class="info-box-icon"><i class="fas fa-child"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Empleado del mes</span>
              <span class="info-box-number">{{$empleadoMes}}</span>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Últimos usuarios</h3>

              <div class="card-tools">
                <span class="badge badge-danger">4 nuevos usuarios</span>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <ul class="users-list clearfix">
                  @foreach ($empleados as $item)
                  <li> 
                    <img src="https://source.unsplash.com/random/50x50?sig={{$item->id}}" />
                  <a class="users-list-name">{{$item->nombre}} {{$item->apellidos}}</a>
                  <span class="users-list-date">
                     
                  </span>
                </li>
                  @endforeach
              </ul>
            </div>
            <div class="card-footer text-center">
              <a href="{{route('empleados.index')}}">Ver todos los usuarios</a>
            </div>
          </div>
      </div>
  </div>
     @endcan
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@stop

@section('js')
    <script src="/js/domLoaded.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
    <script src="/js/dashboard.js"></script>      
@endsection

  
  
  
