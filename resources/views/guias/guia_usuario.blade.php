@extends('adminlte::page')

@section('title', 'Guida de usuario')

@section('content')

<section class="container-fuild pt-4">
    <div class="row">
        <h1 class="col-6">Guia de usuario</h1>
        <div class="col-6 text-right">
            <a href="{{route('imprimir_guia')}}" class="btn btn-primary">Descargar PDF
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
                        <p>En esta sección se podrá ver todos los pedidos que se han realizado, se podrá ver el estado
                            de cada uno de ellos, si se encuentra en proceso, si ya fue entregado o si fue cancelado.
                        </p>
                        <p>Se podrá ver el detalle de cada pedido, en el cual se podrá ver el proveedor, la fecha de
                            entrega, el estado del pedido, los productos que se compraron y el total de la compra.</p>
                        <p>Se podrá ver el detalle de cada producto, en el cual se podrá ver el nombre, la descripción,
                            el precio, la cantidad y el total de cada producto.</p>
                        <p>Se podrá ver el detalle de cada proveedor, en el cual se podrá ver el nombre, la dirección,
                            el teléfono, el correo, la descripción y las estrellas.</p>
                        <p>Se podrá ver el detalle de cada cliente, en el cual se podrá ver el nombre, la dirección, el
                            teléfono, el correo, la descripción y las estrellas.</p>
                        <p>Se podrá ver el detalle de cada usuario, en el cual se podrá ver el nombre, el correo, el rol
                            y la fecha de creación.</p>
                        <p>Se podrá ver el detalle de cada rol, en el cual se podrá ver el nombre, la descripción y la
                            fecha de creación.</p>
                        <p>Se podrá ver el detalle de cada permiso, en el cual se podrá ver el nombre, la descripción y
                            la fecha de creación.</p>
                        <p>Se podrá ver el detalle de cada producto, en el cual se podrá ver el nombre, la descripción,
                            el precio, la cantidad y el total de cada producto.</p>
                        <p>Se podrá ver el detalle de cada proveedor, en el cual se podrá ver el nombre, la dirección,
                            el teléfono, el correo, la descripción y las estrellas.</p>
                        <p>Se podrá ver el detalle de cada cliente, en el cual se podrá ver el nombre, la dirección, el
                            teléfono, el correo, la descripción y las estrellas.</p>
                        <p>Se podrá ver el detalle de cada usuario, en el
                            cual se podrá ver el nombre, el correo, el rol y la fecha de creación.</p>
                        <p>Se podrá ver el detalle de cada rol, en el cual se podrá ver el nombre, la descripción y la
                            fecha de creación.</p>
                        <p>Se podrá ver el detalle de cada permiso, en el cual se podrá ver el nombre, la descripción y
                            la fecha de creación.</p>
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
                        <p>En esta sección se podrá ver todos los productos que se han registrado, se podrá ver el
                            estado de cada uno de ellos, si se encuentra en proceso, si ya fue entregado o si fue
                            cancelado.</p>
                        <p>Se podrá ver el detalle de cada pedido, en el cual se podrá ver el proveedor, la fecha de
                            entrega, el estado del pedido, los productos que se compraron y el total de la compra.</p>
                        <p>Se podrá ver el detalle de cada producto, en el cual se podrá ver el nombre, la descripción,
                            el precio, la cantidad y el total de cada producto.</p>
                        <p>Se podrá ver el detalle de cada proveedor, en el cual se podrá ver el nombre, la dirección,
                            el teléfono, el correo, la descripción y las estrellas.</p>
                        <p>Se podrá ver el detalle de cada cliente, en el cual se podrá ver el nombre, la dirección, el
                            teléfono, el correo, la descripción y las estrellas.</p>
                        <p>Se podrá ver el detalle de cada usuario, en el cual se podrá ver el nombre, el correo, el rol
                            y la fecha de creación.</p>
                        <p>Se podrá ver el detalle de cada rol, en el cual se podrá ver el nombre, la descripción y la
                            fecha de creación.</p>
                        <p>Se podrá ver el detalle de cada permiso, en el cual se podrá ver el nombre, la descripción y
                            la fecha de creación.</p>
                        <p>Se podrá ver el detalle de cada producto, en el cual se podrá ver el nombre, la descripción,
                            el precio, la cantidad y el total de cada producto.</p>
                        <p>Se podrá ver el detalle de cada proveedor, en el cual se podrá ver el nombre, la dirección,
                            el teléfono, el correo, la descripción y las estrellas.</p>
                        <p>Se podrá ver el detalle de cada cliente, en el cual se podrá ver el nombre, la dirección, el
                            teléfono, el correo, la descripción y las estrellas.</p>
                        <p>Se podrá ver el detalle de cada usuario, en el cual se podrá ver el nombre, el correo, el rol
                            y la fecha de creación.</p>
                        <p>Se podrá ver el detalle de cada rol, en el cual se podrá ver el nombre, la descripción y la
                            fecha de creación.</p>
                        <p>Se podrá ver el detalle de cada permiso, en el cual se podrá ver el nombre, la descripción y
                            la fecha de creación.</p>

                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title
                    ">Reservas</h3>
                    </div>
                    <div class="card-body">
                        <p>En esta sección se podrá ver todas las reservas que se han realizado, se podrá ver el estado
                            de cada una de ellas, si se encuentra pendiente, si ya fue confirmada o si fue cancelada.
                        </p>

                        <p> Se podrá ver el detalle de cada reserva, en el cual se podrá ver el cliente, la fecha de
                            reserva, el estado de la reserva, el tipo de reserva y el precio total.</p>

                        <p>Se podrá descargar un archivo PDF con la información detallada de cada reserva.</p>

                        <p>Además, se podrá ver más información sobre cada reserva, como la fecha de llegada y salida,
                            la habitación o servicio reservado y cualquier otra información relevante.</p>

                        <p> Se podrá registrar una nueva reserva con el nombre del cliente, el empleado que realiza la
                            reserva, y el tipo de pago seleccionado.</p>

                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title
                    ">Usuarios</h3>
                    </div>
                    <div class="card-body">
                        <p> En esta sección se podrá ver todos los usuarios registrados en el sistema, se podrá ver el
                            estado de cada uno de ellos, si se encuentra activo o si ha sido inhabilitado.</p>

                        <p>
                            Se podrá ver el detalle de cada usuario, en el cual se podrá ver el nombre, el correo, el
                            cargo y la fecha de creación.

                        </p>
                        <p> Se podrá descargar un archivo PDF con la información detallada de cada usuario.</p>

                        <p>Además, se podrá ver más información sobre cada usuario, como su información de contacto, su
                            fecha de nacimiento, o cualquier otra información relevante.</p>

                        <p> Se podrá tener una opción para inhabilitar a un usuario en caso de que sea despedido o no se
                            requiera más su servicio.</p>

                        <p>Se podrá tener una opción para editar la información de un usuario en caso de que haya un
                            cambio
                            en su información de contacto o cargo.</p>

                        <p>Se podrá tener una opción para registrar un nuevo usuario con su respectivo cargo.</p>

                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title
                    ">Clientes</h3>
                    </div>
                    <div class="card-body">
                        <p> En esta sección se podrá ver todos los clientes registrados en el sistema, se podrá ver la
                            información básica de cada uno de ellos, como su nombre, dirección, teléfono y correo
                            electrónico.</p>

                        <p> Se podrá ver el detalle de cada cliente, en el cual se podrá ver la información completa del
                            cliente, incluyendo su dirección, teléfono, correo electrónico, descripción y cualquier otra
                            información relevante.</p>

                        <p>Se podrá tener una opción para editar la información de un cliente en caso de que haya un
                            cambio
                            en su información de contacto o cualquier otra información relevante.</p>

                        <p>Se podrá tener una opción para borrar a un cliente en caso de que ya no deseemos mantener su
                            información en nuestro sistema.</p>

                        <p>Se podrá tener una opción para registrar un nuevo cliente, donde se debera ingresar la
                            información relevante del cliente como su nombre, dirección, teléfono, correo electrónico y
                            cualquier otra información relevante.</p>

                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title
                    ">Proveedores</h3>
                    </div>
                    <div class="card-body">
                        <p> En esta sección se podrá ver todos los proveedores registrados en el sistema, se podrá ver
                            la
                            información básica de cada uno de ellos, como su nombre, dirección, teléfono y correo
                            electrónico.</p>

                        <p> Se podrá ver el detalle de cada proveedor, en el cual se podrá ver la información completa
                            del
                            proveedor, incluyendo su dirección, teléfono, correo electrónico, descripción, productos o
                            servicios que ofrece y cualquier otra información relevante.</p>

                        <p> Se podrá tener una opción para editar la información de un proveedor en caso de que haya un
                            cambio en su información de contacto o cualquier otra información relevante.</p>

                        <p> Se podrá tener una opción para inhabilitar a un proveedor en caso de que ya no deseemos
                            mantener
                            su información o trabajar con el proveedor en cuestión.</p>

                        <p>Se podrá tener una opción para registrar un nuevo proveedor, donde se debera ingresar la
                            información relevante del proveedor como su nombre, dirección, teléfono, correo electrónico,
                            productos o servicios que ofrece, y cualquier otra información relevante.</p>

                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title
                    ">Habitaciones</h3>
                    </div>
                    <div class="card-body">
                        <p>En este módulo se podrá gestionar las habitaciones y servicios adicionales del sistema de
                            forma detallada y completa.</p>

                        <p>El primer submódulo es "Tipo de Habitaciones", en el cual se podrá ver una lista de los
                            diferentes tipos de habitaciones disponibles en el sistema. Además, se podrá ver información
                            detallada de cada tipo de habitación, como la capacidad, el tamaño, la vista, el número de
                            camas, el precio, y cualquier otra información relevante. También se podrá tener la opción
                            de editar o eliminar un tipo de habitación existente, así como registrar un nuevo tipo de
                            habitación con toda la información necesaria.</p>

                        <p>El segundo submódulo es "Gestión de Habitaciones", en el cual se podrá ver una lista de las
                            habitaciones disponibles en el sistema, así como la información detallada de cada una de
                            ellas, como su número, tipo, estado, precio y servicios adicionales asociados. Se podrá
                            tener la opción de asignar servicios adicionales a cada habitación, o quitar servicios ya
                            asignados. También se podrá tener la opción de editar o eliminar una habitación existente,
                            así como registrar una nueva habitación con toda la información necesaria.</p>

                        <p>Por último, el tercer submódulo es "Servicios Adicionales", en el cual se podrá ver una lista
                            de los servicios adicionales disponibles en el sistema, así como la información detallada de
                            cada uno de ellos, como su nombre, descripción, precio, y cualquier otra información
                            relevante. También se podrá tener la opción de editar o eliminar un servicio adicional
                            existente, así como registrar un nuevo</p>

                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title
                    ">Reportes</h3>
                    </div>
                    <div class="card-body">
                        <p>En este módulo se podrá generar y ver diferentes tipos de reportes relacionados con las
                            reservas y las finanzas del sistema.</p>

                        <p>El primer submódulo es "Reportes de Reservas", en el cual se podrá ver una lista de las
                            reservas realizadas en un periodo de tiempo específico, se podrá filtrar por año y mes para
                            ver las reservas de un período específico. Además, se podrá ver información detallada de
                            cada reserva, como el nombre del cliente, el tipo de habitación, el precio, las fechas de
                            check-in y check-out, y cualquier otra información relevante. También se podrá tener la
                            opción de generar un documento en formato PDF con el reporte de reservas para imprimir o
                            compartir.</p>

                        <p>El segundo submódulo es "Reportes Financieros", en el cual se podrá ver una lista de los
                            reportes financieros generados en un período de tiempo específico, se podrá filtrar por año
                            y mes para ver los reportes de un período específico. Además, se podrá ver información
                            detallada de cada reporte financiero, como los ingresos, los gastos, el margen de beneficio,
                            y cualquier otra información relevante. También se podrá tener la opción de generar un
                            documento en formato PDF con el reporte financiero para imprimir o compartir.</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title
                    ">Grafico de reservas</h3>
                    </div>
                    <div class="card-body">
                        <p>En este apartado se podrá ver un gráfico que muestra la cantidad de reservas realizadas en un
                            período de tiempo específico, se podrá filtrar por año y mes para ver las reservas de un
                            período específico. El gráfico podría estar en formato de barra o línea, mostrando la
                            cantidad de reservas por mes, permitiendo una visualización fácil de la cantidad de reservas
                            en un período determinado y poder compararlo con los meses previos. El gráfico también
                            podría tener una opción de exportarlo en diferentes formatos, como PDF o PNG para
                            compartirlo o imprimirlo.</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title
                    ">Perfil de usuario</h3>
                    </div>
                    <div class="card-body">
                        <p>En este apartado se podrá ver y modificar la información del perfil del usuario. El usuario
                            podrá ver y editar su nombre, correo electrónico y también tendrá la opción de cambiar su
                            contraseña. El cambio de contraseña debería requerir la introducción de la contraseña actual
                            y la confirmación de la nueva contraseña antes de ser actualizada. También podría haber una
                            opción para recuperar la contraseña si el usuario la olvida. Ademas, tambien podria tener
                            opciones de cambiar su imagen de perfil, y ver detalles de su cuenta.</p>
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