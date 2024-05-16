function fntdelpersona() {
    swal({
        title: "Realmente quiere eliminar el registro?",
        text: "",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                swal("registro eliminado", {
                    icon: "success",
                });
            } else {
                swal("se ha cancelado la acción");
            }
        });    
}

function btnEliminarCli(id) {
    Swal.fire({
        title: 'Esta seguro de eliminar?',
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = "./?action=delproject&id=id";  
            swal("registro eliminado", {
                icon: "success",
            }); 

        }
    })
}
