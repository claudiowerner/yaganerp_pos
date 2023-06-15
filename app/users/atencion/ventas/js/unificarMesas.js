idMesa = $("#nMesa").text();
idUbic = $("#idUbic").text();

    
$("#btnConfirmarUnif").on("click", function(e)
{
    let unificadas = $("#unificarMesas").val();
    swal({
        title: "¿Está seguro?",
        text: "¿Desea unificar las mesas?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((pagar) => {
        if (pagar)
        {
            $.ajax(
                {
                    url:"func_php/unificar_mesa.php",
                    data: {"mesas":unificadas,"idUbic":idUbic,"idMesa":nMesa},
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





$("#btnUnifSepararMesas").on("click", function(e)
{
    $("#modalUnifSepararMesas").modal("show");
})

$("#btnUnificarMesa").on("click", function(e)
{
    $("#modalUnifSepararMesas").modal("hide");
    $("#modalUnificarMesa").modal("show");
})

