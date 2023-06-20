nCaja = $("#nCaja").text();

$.ajax(
    {
        url:"func_php/cargarIDVenta.php",
        data: {"nCaja": nCaja},
        type: "POST",
        success: function(e)
        {
            $("#id_venta").html(e);
            cargarVentasCaja();
        }
    }
)