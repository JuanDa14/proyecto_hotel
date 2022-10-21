@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
@stop
@section('content')

    <div class="container-fluid pt-4">
        <div class=" card">
            <div class="card-header">
                <div class="row text-center">
                    <div class="col-12 col-md-6 text-md-left">
                        <h5>Productos</h5>
                    </div>
                    @can('create.producto')
                        <div class="col-12 col-md-6 text-md-right">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#agregarproducto"><i class="fas fa-plus-circle"></i> Agregar Producto</button>
                        </div>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                {{-- ALERTA --}}
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
                            <td scope="col">ID</td>
                            <td scope="col">Nombre</td>
                            <td scope="col">Descripción</td>
                            @can('edit.producto')
                                <td scope="col">Acciones</td>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->producto }}</td>
                                <td>{{ $item->descripcion }}</td>
                                @can('edit.producto')
                                    <td>
                                        <div class="row">

                                            <div class="col-12 col-md-6"> <a class="btn btn-primary edit"><i
                                                        class="fas fa-edit"></i></a></div>
                                            <div class="col-12 col-md-6">
                                                <form action="{{ route('productos.destroy', $item->id) }}" method="post"
                                                    id="formulario" class="eliminar">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger" id="btn-borrar"><i
                                                            class="fas fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal AGREGAR -->
    <div class="modal fade" id="agregarproducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Producto</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('productos.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre" class="col-form-label">Nombre del producto:</label>
                            <input type="text" class="form-control" name="txtnombre" required="">
                        </div>
                        <div class="mb-3">
                            <label for="descrip" class="col-form-label">Descripción:</label>
                            <textarea class="form-control" name="txtdescripcion" required=""></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-success">Agregar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- TERMINA MODAL AGREGAR --}}


    <!-- Modal EDITAR -->
    <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Producto</h5>
                </div>
                <div class="modal-body">
                    <form action="/productos" method="post" id="editform">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="nombre" class="col-form-label">Nombre del producto:</label>
                            <input type="text" class="form-control" id="idnombre" name="txtnombre" required="">
                        </div>
                        <div class="mb-3">
                            <label for="descrip" class="col-form-label">Descripcion:</label>
                            <textarea class="form-control" id="iddescripcion" name="txtdescripcion"
                                required=""></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- TERMINA MODAL EDITAR --}}

@stop
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>
    <script src="/js/producto.js"></script>
    <script src="/js/dataTable.js"></script>
    <script src="/js/domLoaded.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('eliminar') === 'OK')
        <script>
             Swal.fire(
                'Eliminado!',
                'El producto ha sido eliminado correctamente.',
                'success'
                )
        </script>
    @endif
    <script>

        $('.eliminar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
            title: 'Eliminar producto?',
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
@stop
