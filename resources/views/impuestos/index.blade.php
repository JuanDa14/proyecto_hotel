@extends('adminlte::page')

@section('title', 'Impuestos')

@section('content_header')
@stop

@section('content')

    <div class="container-fluid pt-4">
        <div class=" card">
            <div class="card-header">
                <div class="row text-center">
                    <div class="col-12 col-md-6 text-md-left">
                        <h5>Impuestos</h5>
                    </div>
                    <div class="col-12 col-md-6 text-md-right">
                        <a href="{{ route('impuestos.create') }}">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-plus-circle"></i> Registrar Impuesto
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                    {{-- ALERTA --}}
                    @if (session('error'))
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </symbol>
                      </svg>
                      <div class="alert alert-danger d-flex align-items-center" role="alert" id="liveAlert2">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        <div>
                            {{ session('error') }}
                        </div>
                      </div>                 
                    @endif
                    @if (session('correcto'))
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </symbol>
                      </svg>
                    <div class="alert alert-success d-flex align-items-center" role="alert" id="liveAlert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div class="pl-2">
                        {{ session('correcto') }}
                    </div>
                    </div>                     
                    @endif
                    {{-- FINAL ALERTA --}}
                <table id="datatable" class="table table dt-responsive nowrap text-center" style="width:100%">
                    <thead>
                        <tr>
                            <td scope="col">#</td>
                            <td scope="col">Dni del Contador</td>
                            <td scope="col">Contador</td>
                            <td scope="col">Fecha de pago</td>
                            <td scope="col">Monto</td>
                            <td scope="col">Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($impuestos as $item)
                           <tr>
                               <td>{{$item->id}}</td>
                               <td>{{$item->dnicontador}}</td>
                               <td>{{$item->contador}}</td>
                               <td>{{$item->fecha}}</td>
                               <td>{{$item->monto}}</td>
                               <td>
                                   <div class="row">
                                       <div class="col-12 col-md-6">
                                           <a href="{{route('impuestos.show',$item->id)}}" class="btn btn-info"><i
                                            class="fas fa-info-circle"></i></a>
                                       </div>        
                                       <div class="col-12 col-md-6">
                                        <a href="{{ route('imprimirImpuesto', $item->id) }}"><button type="submit"
                                                class="btn btn-primary"><i class="fas fa-print"></i></button></a>                               
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('eliminar') === 'OK')
        <script>
             Swal.fire(
                'Eliminado!',
                'El registro del impuesto ha sido eliminado correctamente.',
                'success'
                )
        </script>
    @endif
    <script>

        $('.eliminar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
            title: 'Eliminar el registro de impuesto?',
            text: "No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
               this.submit();
            }
            })
        });
    </script>
    <script>
        setTimeout(() => {
        document.getElementById("liveAlert").remove();
        }, 3000); 

        setTimeout(() => {
        document.getElementById("liveAlert2").remove();
        }, 3000);   
    </script>
@stop
