@extends('adminlte::page')

@section('title', 'Empleados')

@section('content_header')

@stop

@section('content')

    <div class="container-fluid pt-4">
        <div class=" card card-success">
            <div class="card-header">
                <h5>Registrar Empleado</h5>
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
                <form action="{{ route('empleados.store') }}" method="post">
                    @csrf
                   <div class="row">
                       <div class="col-12 col-md-4">
                        <div class="form-group">
                        <label for="iddni">Nombre del empleado</label>
                            <x-jet-input id="name" class="form-control" type="text" name="name" :value="old('name')" required
                                autofocus autocomplete="name" placeholder="Nombres del empleado" />
                        </div>
                       </div>
                       <div class="col-12 col-md-4">
                        <div class="form-group">
                        <label for="iddni">Apellidos del empleado</label>
                            <input id="idapellidos" type="text" class="form-control" name="txtapellidos" required=""
                                placeholder="Apellidos del empleado">
                        </div>
                       </div>
                       <div class="col-12 col-md-4">
                        <div class="form-group">
                        <label for="iddni">Celular del empleado</label>
                            <input id="idcelular" type="number" class="form-control @error('txtcelular') is-invalid @enderror" name="txtcelular" required=""
                                placeholder="Celular" >
                                @error('txtcelular')
                                <span class="invaled-feedback text-danger" id="alert-celular" role="alert"><strong>El Dni que ingreso no es valido</strong></span>
                            @enderror
                        </div>
                       </div>
                   </div>
                   <div class="row">
                    <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label for="iddni">Dni</label>
                        <input id="iddni" type="number" class="form-control  @error('txtdni') is-invalid @enderror" name="txtdni" required="" placeholder="Dni del empleado">
                        @error('txtdni')
                        <span class="invaled-feedback text-danger" id="alert-dni" role="alert"><strong>El Celular que ingreso no es valido</strong></span>
                    @enderror
                    </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="iddireccion">Dirección</label>
                            <input id="iddireccion" type="text" class="form-control" name="txtdireccion" required=""
                                placeholder="Dirección">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="cantidad" class="col-form-label">Departamento:</label>
                            <select class="form-control" aria-label="Default select example" name="txtdepartamento"
                                class="form-control" required="">
                                <option disabled selected value="">Seleccione un departamento</option>
                                @foreach ($departamentos as $item)
                                    <option value="{{ $item->id }}">{{ $item->departamento }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                   </div>
                   <div class="row">
                       <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="email">Correo electrónico</label>
                            <x-jet-input id="email" class="form-control" type="email" name="email" :value="old('email')"
                                required placeholder="Correo electrónico" />
                        </div>
                       </div>
                       <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <x-jet-input id="password" class="form-control" type="password" name="password" required
                                autocomplete="new-password" placeholder="Contraseña" />
                        </div>
                       </div>
                       <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="password_confirmation">Confirma Contraseña</label>
                            <x-jet-input id="password_confirmation" class="form-control" type="password"
                                name="password_confirmation" required autocomplete="new-password"
                                placeholder="Confirmar Contraseña" />
                        </div>
                       </div>                     
                   </div>                                
                    <div class="modal-footer d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">Registrar</button>
                        <a class="btn btn-danger" href="{{ route('empleados.index') }}">Atras</a>
                    </div>
                </form>
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
