@extends('adminlte::page')

@section('title', 'Ordenes de compra')

@section('content_header')
@stop

@section('content')

    <div class="container-fluid"><br>
        <div class=" card m-4">
            <div class="card-header">
                <div class="row">
                    <div class="col-12">
                        <h5>Nueva Orden de Compra</h5>
                    </div>                  
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('ordencompras.store') }}" method="post" class="realizar">
                    @csrf
                    <div class=" row form-group">
                        <div class="col-12 col-md-4">
                           <select id="idinsumo" class="form-control selectpicker" data-live-search="true" required>
                                <option selected disabled value="0">Seleccione los insumos</option>
                                @foreach ($insumos as $item)
                                    <option
                                        value="{{ $item->id }}_{{ $item->insumo }}_{{ $item->descripcion }}">
                                        {{ $item->insumo }}</option>
                                @endforeach
                            </select>                    
                        </div>
                        <div class="col-12 col-md-2">
                            <input id="idcantidad" type="number" class="form-control mr-lg-5" name="txtcantidad"
                                placeholder="Cantidad" required>
                        </div>
                        <div class="col-12 col-md-3">
                            <button id="idlimpiar" type="button" class="w-100 btn btn-primary" onclick="limpiar()">Nueva</button>
                        </div>
                        <div class="col-12 col-md-3">
                            <button id="idagregar" type="button" class="btn btn-success w-100"
                                onclick=" agregarInsumo()">Agregar
                                insumo</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12" style="margin-top:15px;">
                            <table id="detalle" class="table table-condensed table-bordred table text-center">
                                <tr>
                                    <td>Insumo</td>
                                    <td>Cantidad</td>
                                    <td>Accion</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button id="idboton" type="submit" class="btn btn-success disabled" >Grabar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@stop

@section('js')
    <script src="/js/domLoaded.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
    <script src="/js/ordenCompra.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.realizar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
            title: 'Registrar orden de compra?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si!',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
               this.submit();
            }
            })
        });
    </script>
@stop
