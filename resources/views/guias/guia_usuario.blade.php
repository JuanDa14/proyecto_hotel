@extends('adminlte::page')

@section('title', 'Guida de usuario')

@section('content')

<section class="container-fuild pt-4">
    <div class="row">
        <h1 class="col-6">Guia de usuario</h1>
        <div class="col-6 text-right">
            <a href="#" class="btn btn-primary" target="_blank">Descargar PDF
                <i class="fas fa-download"></i>
            </a>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title
                    ">Pedidos</h3>
                    </div>
                    <div class="card-body">
                        <p>En esta sección se podrá ver todos los pedidos que se han realizado, se podrá ver el estado de cada uno de ellos, si se encuentra en proceso, si ya fue entregado o si fue cancelado.</p>
                        <p>Se podrá ver el detalle de cada pedido, en el cual se podrá ver el proveedor, la fecha de entrega, el estado del pedido, los productos que se compraron y el total de la compra.</p>
                        <p>Se podrá ver el detalle de cada producto, en el cual se podrá ver el nombre, la descripción, el precio, la cantidad y el total de cada producto.</p>
                        <p>Se podrá ver el detalle de cada proveedor, en el cual se podrá ver el nombre, la dirección, el teléfono, el correo, la descripción y las estrellas.</p>
                        <p>Se podrá ver el detalle de cada cliente, en el cual se podrá ver el nombre, la dirección, el teléfono, el correo, la descripción y las estrellas.</p>
                        <p>Se podrá ver el detalle de cada usuario, en el cual se podrá ver el nombre, el correo, el rol y la fecha de creación.</p>
                        <p>Se podrá ver el detalle de cada rol, en el cual se podrá ver el nombre, la descripción y la fecha de creación.</p>
                        <p>Se podrá ver el detalle de cada permiso, en el cual se podrá ver el nombre, la descripción y la fecha de creación.</p>
                        <p>Se podrá ver el detalle de cada producto, en el cual se podrá ver el nombre, la descripción, el precio, la cantidad y el total de cada producto.</p>
                        <p>Se podrá ver el detalle de cada proveedor, en el cual se podrá ver el nombre, la dirección, el teléfono, el correo, la descripción y las estrellas.</p>
                        <p>Se podrá ver el detalle de cada cliente, en el cual se podrá ver el nombre, la dirección, el teléfono, el correo, la descripción y las estrellas.</p>
                        <p>Se podrá ver el detalle de cada usuario, en el
                            cual se podrá ver el nombre, el correo, el rol y la fecha de creación.</p>
                        <p>Se podrá ver el detalle de cada rol, en el cual se podrá ver el nombre, la descripción y la fecha de creación.</p>
                        <p>Se podrá ver el detalle de cada permiso, en el cual se podrá ver el nombre, la descripción y la fecha de creación.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title
                    ">Productos</h3>
                    </div>
                    <div class="card-body">
                        <p>En esta sección se podrá ver todos los productos que se han registrado, se podrá ver el estado de cada uno de ellos, si se encuentra en proceso, si ya fue entregado o si fue cancelado.</p>
                        <p>Se podrá ver el detalle de cada pedido, en el cual se podrá ver el proveedor, la fecha de entrega, el estado del pedido, los productos que se compraron y el total de la compra.</p>
                        <p>Se podrá ver el detalle de cada producto, en el cual se podrá ver el nombre, la descripción, el precio, la cantidad y el total de cada producto.</p>
                        <p>Se podrá ver el detalle de cada proveedor, en el cual se podrá ver el nombre, la dirección, el teléfono, el correo, la descripción y las estrellas.</p>
                        <p>Se podrá ver el detalle de cada cliente, en el cual se podrá ver el nombre, la dirección, el teléfono, el correo, la descripción y las estrellas.</p>
                        <p>Se podrá ver el detalle de cada usuario, en el cual se podrá ver el nombre, el correo, el rol y la fecha de creación.</p>
                        <p>Se podrá ver el detalle de cada rol, en el cual se podrá ver el nombre, la descripción y la fecha de creación.</p>
                        <p>Se podrá ver el detalle de cada permiso, en el cual se podrá ver el nombre, la descripción y la fecha de creación.</p>
                        <p>Se podrá ver el detalle de cada producto, en el cual se podrá ver el nombre, la descripción, el precio, la cantidad y el total de cada producto.</p>
                        <p>Se podrá ver el detalle de cada proveedor, en el cual se podrá ver el nombre, la dirección, el teléfono, el correo, la descripción y las estrellas.</p>
                        <p>Se podrá ver el detalle de cada cliente, en el cual se podrá ver el nombre, la dirección, el teléfono, el correo, la descripción y las estrellas.</p>
                        <p>Se podrá ver el detalle de cada usuario, en el cual se podrá ver el nombre, el correo, el rol y la fecha de creación.</p>
                        <p>Se podrá ver el detalle de cada rol, en el cual se podrá ver el nombre, la descripción y la fecha de creación.</p>
                        <p>Se podrá ver el detalle de cada permiso, en el cual se podrá ver el nombre, la descripción y la fecha de creación.</p>

                    </div>
                </div>
            </div>
        </div>
</section>
@stop

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
<link rel="stylesheet" href="sweetalert2.min.css">
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>
<script src="/js/dataTable.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


@stop