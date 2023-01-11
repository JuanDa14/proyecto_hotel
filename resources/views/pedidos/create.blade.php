@extends('adminlte::page')

@section('title', 'Nuevo Pedido')

@section('content')
    <div class="container-fluid pt-4">
        <div class="row mb-4">
            <div class="col-12 col-md-6 text-md-left">
                <h3 class="text-gray">Nuevo Pedido</h3>
            </div>
            <div class="col-12 col-md-6 text-md-right">
                <a href="{{ route('pedidos.index') }}" class="btn btn-success">
                    <i class="fas fa-arrow-left"></i>
                    Regresar
                </a>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <form action="{{ route('pedidos.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-6 form-group">
                            <label for="fechap">Fecha Entrega</label>
                            <input required type="date" class="form-control" id="fechap"  name="fechap">
                        </div>
                        <div class="col-12 col-md-6 form-group">
                            <label for="proveedor">Proveedor</label>
                            <select name="proveedor" id="proveedor" class="form-control">
                                <option value="" disabled selected>-- Selecciona --</option>
                                @foreach ($proveedores as $proveedor)
                                    <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-md-6 form-group">
                            <label for="producto">Productos</label>
                            <select name="producto" id="producto" class="form-control">
                                <option value="" disabled selected>-- Selecciona --</option>
                                @foreach ($productos as $producto)
                                    <option value="{{ $producto->id }}_{{ $producto->precio }}_{{ $producto->nombre }}">{{ $producto->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12 col-md-6 form-group">
                            <label for="precio">Precio</label>
                            <input type="text" id="precio" class="form-control" disabled>
                        </div>

                        <div class="col-12 col-md-6 form-group">
                            <label for="cantidad">Cantidad</label>
                            <input type="number" id="cantidad" class="form-control">
                        </div>

                        <div class="col-12 mb-3">
                            <button type="button" class="btn btn-success" id="btnadd">Agregar</button>
                        </div>
                        
                        
                        <h5 class="col-12">Detalle Pedido</h5>
                        <table class="table text-center mt-3">
                            <thead>
                                <th>Quitar</th>
                                <th>Descripcion</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Subtotal</th>
                            </thead>
                            <tbody id="body"></tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5">
                                        <span>TOTAL: </span>
                                        <input type="text" id="total" hidden name="total">
                                        <span class="fs-2" id="total_span">00.0</span>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/js/addpedidos.js"></script>
@stop