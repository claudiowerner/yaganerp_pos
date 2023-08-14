cargarIDVentaCaja();
function cargarIDVentaCaja()
{
    nCaja = $("#nCaja").text();
    $.ajax(
        {
            url:"func_php/cargarIDVenta.php",
            data: {"nCaja": nCaja},
            type: "POST",
            success: function(e)
            {
                alert(e)
                $("#id_venta").html(e);
                cargarVentasCaja();
            }
        }
    )
    .fail(function(e)
        {
            msjes_swal("Error al cargar ID de la venta: ",e,"error");
        })
}