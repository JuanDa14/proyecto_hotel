const boton = document.querySelector(".card-footer button");
const tabla = document.getElementById("detalle");
const cantidad = document.getElementById("idcantidad");

let insumoRepetido = [];
let cantidadInsumo = [];

let i = 0;
let k = 0;
let v = 0;
let cantidadAnterior = 0;

const agregarInsumo = () => {
    if (cantidad.value <= 0) return alert("Por favor rellene todos los campos");

    const datosInsumo = document.getElementById("idinsumo").value.split("_");

    for (let j = 0; j < insumoRepetido.length; j++) {
        if (insumoRepetido[j] == datosInsumo[1]) {
            cantidadAnterior = cantidadInsumo[j];
            cantidadAnterior =
                parseInt(cantidadAnterior) + parseInt(cantidad.value);
            cantidadInsumo[j] = cantidadAnterior;
            document.getElementById("idquitar" + j).innerHTML =
                '<a class="btn btn-danger" onclick="quitar(' +
                j +
                ')">Quitar</a>';
            document.getElementById("idArrayCantidad" + j).value =
                cantidadAnterior;
            return (document.getElementById("idTdCantidad" + j).textContent =
                cantidadInsumo[j]);
        }
    }
    cantidadInsumo[k] = cantidad.value;

    fila = `<tr id=fila${i}><td>${datosInsumo[1]}</td><input type=hidden name=insumos[] value=
        "${datosInsumo[0]}"><td id=idTdCantidad${i}>${cantidadInsumo[k]}</td><input id=idArrayCantidad${k} type=hidden name=cantidades[] value=
        ${cantidadInsumo[k]}><td id=idquitar${i}><a class ="btn btn-danger" onclick=quitar(${i})>Quitar</a></td>`;

    insumoRepetido[i] = datosInsumo[1];
    i++;
    boton.classList.remove("disabled");
    tabla.innerHTML += fila;
    k++;
    v++;
};

const quitar = (id) => {
    delete insumoRepetido[id];
    delete cantidadInsumo[id];
    document.getElementById("fila" + id).remove();
    v--;
    if (v === 0) {
        limpiar();
    }
};

const limpiar = () => {
    cantidad.value = "";

    boton.classList.add("disabled");

    insumoRepetido = [];
    cantidadInsumo = [];

    for (let i = 0; i < k; i++) {
        $("#fila" + i).remove();
    }

    i = 0;
    k = 0;
    cantidadAnterior = 0;
};

$(document).ready(function () {
    let tabla = $("#datatable").DataTable();
    tabla.on("click", ".edit", function () {
        $tr = $(this).closest("tr");
        if ($($tr).hasClass("child")) {
            $tr = $tr.prev(".parent");
        }
        let datos = tabla.row($tr).data();
        let monto = $(`input[id=inputMonto${datos[0]}]`).val();
        $("#idproveedora").val(datos[2]);
        $("#idmonto").val(parseInt(monto));
        $("#editform").attr("action", "/ordencompras/" + datos[0]);
        $("#editmodal").modal("show");
    });
});
