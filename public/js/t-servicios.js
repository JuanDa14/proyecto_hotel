$('.form-edit').submit( function(e) {
    e.preventDefault()
    Swal.fire({
        title: '¿Seguro que desea editar?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí',                
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
})

$('.form-delete').submit( function(e) {
    e.preventDefault()
    Swal.fire({
        title: '¿Seguro que desea eliminar?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí',                
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
})

