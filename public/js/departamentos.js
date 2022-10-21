$(document).ready(function () {
    let tabla = $("#datatable").DataTable();

    tabla.on("click", ".edit", function () {
        $tr = $(this).closest("tr");
        if ($($tr).hasClass("child")) {
            $tr = $tr.prev(".parent");
        }

        let datos = tabla.row($tr).data();

        $("#iddepartamento").val(datos[1]);

        $("#editform").attr("action", "/departamentos/" + datos[0]);
        $("#editmodal").modal("show");
    });
});

setTimeout(() => {
    document.getElementById("liveAlert").remove();
}, 3000);