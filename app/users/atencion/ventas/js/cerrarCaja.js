$("#btnCerrarCaja").on("click", function(e)
{
    swal({
        title: "¿Está seguro?",
        text: "¿Desea cerrar esta caja?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((cerrar) => {
        if (cerrar)
        {
            
        } 
        else 
        {
          swal("La caja seguirá abierta");
        }
      });
})