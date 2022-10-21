$("#datatable").DataTable({
    responsive: true,
    autoWidth: false,
    language: {
        lengthMenu: "Mostrar _MENU_ registros por pagina",
        zeroRecords: "No hay registros disponibles",
        info: "Mostrando la pagina _PAGE_ de _PAGES_",
        infoEmpty: "No hay registros disponibles",
        infoFiltered: "(filtrado de _MAX_ registros totales)",
        search: "Buscar:",
        paginate: {
            next: "Siguiente",
            previous: "Anterior",
        },
    },
});
