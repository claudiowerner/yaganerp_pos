$("#btnConfirmarSeparacion").on("click", function(e)
{
    let unificadas = $("#separarMesas").val();
    let nombreMesa = $("#nomMesa").text();
    swal({
        title: "¿Está seguro?",
        text: "¿Desea separar las mesas?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((pagar) => {
        if (pagar)
        {
            $.ajax(
                {
                    url:"func_php/separar_mesa.php",
                    data: {"mesas":unificadas,"idUbic":idUbic,"idMesa":nMesa,"nombreMesa":nombreMesa},
                    type: "POST",
                    success: function(e)
                    {
                        swal({
                            title: "Excelente",
                            text: e,
                            icon: "success"
                        });
                        cargarSepararMesa();
                        cargarUnificarMesa();
                        cargarNomMesa();
                        obtener_pisos_cambio_mesa();
                    }
                }
            )
        } 
        else 
        {
          swal("Operación cancelada");
        }
    });
})




$("#btnSepararMesa").on("click", function(e)
{
    $("#modalUnifSepararMesas").modal("hide");
    $("#modalSepararMesa").modal("show");
})