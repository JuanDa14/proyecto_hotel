@extends('adminlte::page')

@section('title', 'Nuevo Producto')

@section('content')
    <div class="container-fluid pt-4">
        <div class="row mb-4">
            <div class="col-12 col-md-6 text-md-left">
                <h3 class="text-gray">Nuevo Producto</h3>
            </div>
            <div class="col-12 col-md-6 text-md-right">
                <a href="{{ route('productos.index') }}" class="btn btn-success">
                    <i class="fas fa-arrow-left"></i>
                    Regresar
                </a>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <form action="{{ route('productos.update', $producto->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-12 form-group">
                            <label for="nombre">Nombre</label>
                            <input required type="text" class="form-control" id="nombre" placeholder="Ingrese la nombre" name="nombre" value="{{ $producto->nombre }}">
                        </div>
                        <div class="col-12 form-group">
                            <label for="descripcion">Descripcion</label>
                            <input required type="text" class="form-control" id="descripcion" placeholder="Ingrese la descripcion" name="descripcion" value="{{ $producto->descripcion }}">
                        </div>
                        <div class="col-12 form-group">
                            <label for="precio">Precio</label>
                            <input required type="text" class="form-control" id="precio" placeholder="Ingrese la precio" name="precio" value="{{ $producto->precio }}">
                        </div>
                        <div class="col-12 mt-3" style="display: flex; align-items: center">
                            <button type="submit" class="w-100 btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop