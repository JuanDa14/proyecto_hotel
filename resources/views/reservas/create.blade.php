@extends('adminlte::page')

@section('title', 'Reservas')

@section('content')

<div class="container-fluid pt-5">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card">
                <div class="card-header " style="background-color: #D6DBDF">
                    <div class="row">
                        <div class="col-12">
                            <h5>Nueva Reserva</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body  ml-4 mr-4">
                    {{-- ALERTA --}}
                    @if (session('error'))
                    <div class="alert alert-danger alert-dismissible" role="alert" id="liveAlert2">
                        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </symbol>
                        </svg>
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                            <use xlink:href="#exclamation-triangle-fill" />
                        </svg>
                        <label> ERROR : {{ session('error') }}</label>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if (session('correcto'))
                    <div class="alert alert-success alert-dismissible" role="alert" id="liveAlert">
                        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                            </symbol>
                        </svg>
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                            <use xlink:href="#check-circle-fill" />
                        </svg>
                        <label>{{ session('correcto') }}</label>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <form action="{{ route('reservas.store') }}" method="post" class="realizar">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <p class="h6">Vendedor : </p>
                                    <select class="form-control selectpicker " id="idempleado" data-live-search="true" onchange="agregarEmpleado()">
                                        <option selected disabled value="0">Seleccione un Vendedor</option>
                                        @foreach ($vendedores as $item)
                                        <option value="{{ $item->id }}_{{$item->name}}_{{$item->apellidos}}_{{$item->dni}}">
                                            {{ $item->name }} {{ $item->apellidos }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" id="idverificarEmpleado" value="">
                                </div>
                                <div class="col-12 col-md-6">
                                    <p class="h6">Tipo de Pago :</p>
                                    <select class="form-control " id="idtipoPago" name="tipoPago">
                                        <option selected disabled value="0">Seleccione el tipo de pago</option>
                                        <option value="EFECTIVO">Efectivo</option>
                                        <option value="TARJETA">Tarjeta</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 col-md-4">
                                    <input type="text" disabled readonly class="form-control" placeholder="Nombre del Vendedor" id="idNombreVendedor">
                                </div>
                                <div class="col-12 col-md-4">
                                    <input type="text" disabled readonly class="form-control" placeholder="Apellidos del Vendedor" id="idApellidosVendedor">
                                </div>
                                <div class="col-12 col-md-4">
                                    <input type="number" disabled readonly class="form-control" placeholder="Dni del Vendedor" id="idDniVendedor">
                                </div>
                            </div>
                        </div>
                        <div class=" form-group">
                            <div class="row align-justify-center">
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <p for="idcliente" class="h6">Nombre del cliente</p>
                                        <input id="idcliente" disabled class="form-control" type="text" name="cliente" placeholder="Nombre del cliente">
                                        <input type="hidden" id="idverificarCliente">
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <p for="iddni" class="h6">DNI del cliente</p>
                                        <select class="form-control selectpicker" id="iddni" name="dnicliente" data-live-search="true" onchange="agregarCliente()">
                                            <option selected disabled value="0">Seleccione un Cliente</option>
                                            @foreach ($clientes as $item)
                                            <option value="{{ $item->id }}_{{$item->nombres}}_{{$item->dni}}">
                                                {{$item->dni}}
                                            </option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" id="idverificarDni">
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 mt-4 text-center">
                                    <a href="{{ route('clientes.create') }}"><button type="button" class="w-75 btn btn-secondary">Nuevo Cliente</button></a>
                                </div>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class=" row form-group">
                            <div class="col-12 col-md-3">
                                <select id="idproducto" class="form-control selectpicker" data-live-search="true" onchange="agregarHabitacion()">
                                    <option selected disabled value="0">Seleccione una habitacion</option>
                                    @foreach ($habitaciones as $habitacion)
                                    <option value="{{ $habitacion->id }}_{{ $habitacion->descripcion }}_{{ $habitacion->precio }}_{{ $habitacion->disponible }}">
                                        {{ $habitacion->numeroHabitacion }}
                                    </option>
                                    @endforeach
                                </select>

                                @foreach ($habitaciones as $habitacion)
                                <input type="hidden" value="{{ $habitacion->disponible }}" id="idcantidad{{ $habitacion->id }}">
                                @endforeach
                            </div>
                            <div class="col-12 col-md-2">
                                <input id="txtprecio" disabled type="number" class="form-control mr-lg-5" name="txtprecio" placeholder="Precio" required>
                            </div>

                            <div class="col-12 col-md-2">
                                <input id="idcantidad" type="number" class="form-control mr-lg-5" name="txtcantidad" placeholder="Cantidad">
                            </div>

                            <!-- <div class="col-12 col-md-1 pr-4">
                                <button type="button" style="background-color: #EC7063" class="w-100 btn text-white " data-bs-toggle="modal" data-bs-target="#agregarproducto"><i class="fas fa-plus"></i></button>
                            </div> -->

                            <div class="col-12 col-md-2">
                                <button id="idlimpiar" type="button" class="w-100 btn btn-primary" onclick="limpiar()">Limpiar</button>
                            </div>

                            <div class="col-12 col-md-3">
                                <button id="idlimpiar" type="button" class="btn btn-success w-100" onclick=" agregarProducto()">Agregar</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12" style="margin-top:15px;">
                                <table id="detalle" class="table table-condensed table-bordred  text-center">
                                    <thead>
                                        <tr>
                                            <th>Vendedor</th>
                                            <th>Cliente</th>
                                            <th>Habitacion</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>

                                </table>

                            </div>
                            <div>
                                <label>Total : S/<span id="idtotal">0.00</span></label>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button id="idboton" type="submit" class="btn btn-success disabled">Grabar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@stop

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
</script>
<script>
    if (document.getElementById("liveAlert")) {
        setTimeout(() => {
            document.getElementById("liveAlert").remove();
        }, 3000);
    }

    if (document.getElementById("liveAlert2")) {
        setTimeout(() => {
            document.getElementById("liveAlert2").remove();
        }, 3000);
    }
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('.realizar').submit(function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Realizar reserva?',
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

<script>
    const agregarEmpleado = () => {
        const empleado = document.getElementById("idempleado").value.split("_");
        const nombre = document.getElementById("idNombreVendedor");
        const apellidos = document.getElementById("idApellidosVendedor");
        const dni = document.getElementById("idDniVendedor");
        nombre.value = empleado[1];
        apellidos.value = empleado[2];
        dni.value = empleado[3];
        return null;
    };

    const agregarCliente = () => {
        const dni = document.getElementById("iddni").value.split("_");
        const cliente = document.getElementById("idcliente");
        cliente.value = dni[1];
        return null;
    };

    const agregarHabitacion = () => {
        const habitacion = document.getElementById("idproducto").value.split("_");
        const precio = document.getElementById("txtprecio");
        precio.value = habitacion[2];
        return null;
    };

    const verificarEmpleado = document.getElementById("idverificarEmpleado");
    const verificarCliente = document.getElementById("idverificarCliente");
    const tipoPago = document.getElementById("idtipoPago");
    const boton = document.querySelector(".card-footer button");
    const tabla = document.getElementById("detalle");
    const cantidadtotal = document.getElementById("idcantidad");
    let inputcantidad;
    let productoRepetido = [];
    let cantidadProducto = [];
    let precioProducto = [];
    let indice = 0;
    let total = 0.0;
    let i = 0;
    let k = 0;
    let cantidadAnterior = 0;

    const agregarProducto = () => {
        const precio = document.getElementById("txtprecio").value;
        const datosProducto = document
            .getElementById("idproducto")
            .value.split("_");
        const datosEmpleado = document
            .getElementById("idempleado")
            .value.split("_");
        const datosCliente = document.getElementById("iddni").value.split("_");
        const tipoPago = document.getElementById("idtipoPago").value.trim();
        const dni = datosCliente[2];
        if (
            datosEmpleado[1] == null ||
            datosProducto[1] == null ||
            cantidadtotal.value <= 0 ||
            tipoPago == 0
        )
            return Swal.fire("Hubo un error!", "Aún hay campos vacios", "error");

        indice++;

        if (indice == 1) {
            verificarEmpleado.value = datosEmpleado[1];
            verificarCliente.value = datosCliente[1];
        }
        if (datosEmpleado[1] != verificarEmpleado.value && indice > 1)
            return Swal.fire(
                "Hubo un problema!",
                "El vendedor no coincide con el seleccionado",
                "info"
            );

        if (datosCliente[1] != verificarCliente.value && indice > 1)
            return Swal.fire(
                "Hubo un problema!",
                "El cliente ha sido modificado",
                "info"
            );

        for (let j = 0; j < productoRepetido.length; j++) {
            if (productoRepetido[j] == datosProducto[1]) {
                boton.classList.remove("disabled");
                cantidadAnterior = cantidadProducto[j];
                total -=
                    parseFloat(precioProducto[j]) * parseFloat(cantidadAnterior);
                cantidadAnterior =
                    parseInt(cantidadAnterior) + parseInt(cantidadtotal.value);
                cantidadProducto[j] = cantidadAnterior;
                total +=
                    parseFloat(precioProducto[j]) * parseFloat(cantidadAnterior);

                localStorage.setItem("cr", cantidadProducto);
                document.getElementById("idtotal").textContent = total.toFixed(2);
                document.getElementById(`idcantidad${datosProducto[0]}`).value -=
                    parseInt(cantidadtotal.value);
                document.getElementById("idquitar" + j).innerHTML =
                    '<a class="btn btn-danger" onclick="quitar(' +
                    j +
                    "," +
                    datosProducto[0] +
                    "," +
                    precio +
                    "," +
                    cantidadProducto[j] +
                    ')">Quitar</a>';
                document.getElementById("idArrayCantidad" + j).value =
                    cantidadAnterior;
                document.getElementById("idTdCantidad" + j).textContent =
                    cantidadProducto[j];

                return localStorage.setItem(
                    "fila" + j,
                    document.getElementById("fila" + j)
                );
            }
        }

        if (precio <= 0)
            return Swal.fire(
                "Hubo un problema!",
                "Por favor Ingrese el precio",
                "info"
            );

        cantidadProducto[k] = cantidadtotal.value;
        fila = `<tr id = "fila${i}"><td>
                    ${datosEmpleado[1]}</td><input type="hidden" name="vendedor" value="${datosEmpleado[0]}"><td>
                    ${datosCliente[1]}</td><input type="hidden" name="cliente" value="${datosCliente[0]}"><td>
                    ${datosProducto[1]}</td><input type="hidden" name="idproductos[]" value="${datosProducto[0]}">
                    <td>${precio}</td><td id= "idTdCantidad${k}">${cantidadProducto[k]}</td><td id="idquitar${i}">
                    <a class = "btn btn-danger" onclick="quitar(${i},${datosProducto[0]},${precio},${cantidadProducto[k]})">Quitar</a></td>
                    <input id="idArrayCantidad${k}" type="hidden" name="cantidades[]" value="${cantidadProducto[k]}">
                    <input type="hidden" name="precios[]" value="${precio}"><input type="hidden" name="dni" value="${dni}"></tr>`;

        productoRepetido[i] = datosProducto[1];
        precioProducto[i] = precio;
        i++;
        inputcantidad = document.getElementById("idcantidad" + datosProducto[0]);
        inputcantidad.value -= parseFloat(cantidadProducto[k]);
        boton.classList.remove("disabled");
        tabla.innerHTML += fila;
        total += parseFloat(precio) * cantidadProducto[k];
        document.getElementById("idtotal").textContent = total.toFixed(2);
        k++;

    };

    const quitar = (id, idcantidad, precio, cantidad) => {
        delete productoRepetido[id];
        delete cantidadProducto[id];

        localStorage.removeItem("fila" + id);
        document.getElementById("fila" + id).remove();

        total -= parseFloat(precio) * parseFloat(cantidad);
        document.getElementById("idtotal").innerHTML = total.toFixed(2);
        localStorage.setItem("t", document.getElementById("idtotal").textContent);
        if (JSON.parse(localStorage.getItem("t")) === -0.0) {
            localStorage.setItem("t", 0);
            document.getElementById("idtotal").textContent = 0;
        }
    };

    const limpiar = () => {
        localStorage.clear();
        location.reload();
    }
</script>
@stop