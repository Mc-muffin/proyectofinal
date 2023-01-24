function fntDelcliente(id){
    swal({
        title: "Realmente deseas eliminar este registro?",
        text: "",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("Eliminando registro!", {
            icon: "success",
          });
        } else {
          swal("Accion cancelada!");
        }
      });
}

