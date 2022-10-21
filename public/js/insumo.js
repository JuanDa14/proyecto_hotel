$(document).ready(function () {
    let tabla = $("#datatable").DataTable();

    tabla.on("click", ".edit", function () {
        $tr = $(this).closest("tr");
        if ($($tr).hasClass("child")) {
            $tr = $tr.prev(".parent");
        }
        let datos = tabla.row($tr).data();
        $("#idnombre").val(datos[1]);
        $("#iddescripcion").val(datos[2]);

        $("#editform").attr("action", "/insumos/" + datos[0]);
        $("#editmodal").modal("show");
    });
});

setTimeout(() => {
    document.getElementById("liveAlert").remove();
}, 3000);