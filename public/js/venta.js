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
// if (localStorage.getItem("rep")) {
//     i = localStorage.getItem("i");
//     k = localStorage.getItem("k");
//     document.getElementById("idempleado").value = localStorage.getItem("iv");
//     agregarEmpleado();
//     productoRepetido = localStorage.getItem("rep").split(",");
//     cantidadProducto = localStorage.getItem("cr").split(",");
//     precioProducto = localStorage.getItem("pr").split(",");

//     document.getElementById("idcliente").value = localStorage.getItem("nom");
//     document.getElementById("iddni").value = localStorage.getItem("dni");
//     document.getElementById("idtipoPago").value = localStorage.getItem("it");
//     document.getElementById("idtotal").innerHTML = localStorage.getItem("t");
//     total = parseFloat(localStorage.getItem("t"));

//     const keys = [];

//     for (let index = 0; index < localStorage.length; index++) {
//         if (localStorage.key(index).length > 3) {
//             keys.push(localStorage.key(index));
//         }
//     }
//     keys.sort();

//     for (let index = 0; index < keys.length; index++) {
//         console.log(keys[index]);
//         tabla.innerHTML += localStorage.getItem(keys[index]);
//     }
// }

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
    // localStorage.setItem("nom", datosCliente[1]);
    // localStorage.setItem("dni", document.getElementById("iddni").value);
    // localStorage.setItem("it", document.getElementById("idtipoPago").value);

    // localStorage.setItem("rep", productoRepetido);
    // localStorage.setItem("cr", cantidadProducto);
    // localStorage.setItem("pr", precioProducto);

    // localStorage.setItem("t", document.getElementById("idtotal").textContent);
    // localStorage.setItem("iv", document.getElementById("idempleado").value);
    // localStorage.setItem("i", i);
    // localStorage.setItem("k", k);
    // localStorage.setItem("fila" + (k - 1), fila);
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

    const nombre = document.getElementById("idNombreVendedor");
    const apellidos = document.getElementById("idApellidosVendedor");
    const dni = document.getElementById("idDniVendedor");
    const dniCliente = document.getElementById("iddni");

    nombre.value = "";
    apellidos.value = "";
    dni.value = "";
    dniCliente.value = "";

    const datosProducto = document.getElementById("idproducto");
    const datosEmpleado = document.getElementById("idempleado");
    const datosCliente = document.getElementById("idcliente");

    datosProducto.value = "0";
    datosEmpleado.value = "0";
    tipoPago.value = "0";
    datosCliente.value = "";

    cantidadtotal.value = "";
    boton.classList.add("disabled");
    total = 0;
    document.getElementById("idtotal").textContent = total;

    verificarEmpleado.value = "";
    verificarCliente.value = "";

    for (let i = 0; i <= productoRepetido.length; i++) {
        productoRepetido.shift();
        precioProducto.shift();
    }

    for (let i = 0; i < indice; i++) {
        $("#fila" + i).remove();
    }

    indice = 0;
    i = 0;
    k = 0;
    location.reload();
};

// document.addEventListener("DOMContentLoaded", (e) => {
//     if (localStorage.getItem("url")) {
//         localStorage.getItem("url") == "http://127.0.0.1:8000/ventas/create"
//             ? console.log("no borrar")
//             : limpiar();
//         localStorage.setItem("url", window.location.href);
//     }
// });
