@extends('adminlte::page')

@section('title', 'Empleados')

@section('content_header')

@stop

@section('content')

    <div class="container-fluid pt-4">
        <div class=" card card-info">
            <div class="card-header">
                <h5>Registro de Impuesto N° {{$impuesto->id}}</h5>
            </div>
            <div class="card-body">
                   <div class="row">
                       <div class="col-12 col-md-6">
                        <div class="form-group">
                        <label>Nombre del Contador</label>
                        <input type="text" disabled placeholder="Ingrese nombre del contador" name="txtcontador" required class="form-control" value="{{$impuesto->contador}}">                           
                        </div>
                       </div>
                       <div class="col-12 col-md-6">
                        <div class="form-group">
                        <label>Dni del contador</label>
                        <input type="number" disabled placeholder="Ingrese el dni del contador" value="{{$impuesto->dnicontador}}" name="txtdni" required class="form-control" @error('txtdni') is-invalid @enderror>
                        @error('txtdni')
                        <span class="invaled-feedback text-danger" id="alert-celular" role="alert"><strong>El Dni que ingreso no es valido</strong></span>
                        @enderror
                        </div>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="email">Monto</label>
                            <input type="number"  disabled placeholder="Ingrese el monto del impuesto" name="txtmonto" required class="form-control" value="{{$impuesto->monto}}">
                        </div>
                       </div>
                       <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="password_confirmation">Fecha de pago</label>
                            <input type="date" name="txtfecha" required class="form-control" value="{{$impuesto->fecha}}" disabled>                            
                        </div>
                       </div>                     
                   </div>                                
                    <div class="modal-footer d-flex justify-content-between">
                        <a class="btn btn-danger" href="{{ route('impuestos.index') }}">Atras</a>
                    </div>
            </div>
        </div>
    </div>

@stop

@section('js')
<script src="/js/domLoaded.js"></script>
<script>
    setTimeout(() => {
    document.getElementById("liveAlert").remove();
    }, 3000); 

    setTimeout(() => {
    document.getElementById("liveAlert2").remove();
    }, 3000);   
</script>
@stop
