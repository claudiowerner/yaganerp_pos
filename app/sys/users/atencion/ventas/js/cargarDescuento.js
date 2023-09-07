cargarDescto();
function cargarDescto()
{
    let id_venta = $("#id_venta").text();
    nCaja = $("#nCaja").text();
    $.ajax(
        {
            url:"func_php/cargarDescto.php",
            data: {"id_venta": id_venta},
            type: "POST",
            success: function(e)
            {
                cargarVentasCaja();
                $("#descuento").html(parseInt(e));
                let totalVenta = parseInt($("#totalVenta").text());
                let descto = parseFloat($("#descuento").text()/100);
                let desctoHecho = Math.round(totalVenta*descto);
                let valorPostDescto = totalVenta-desctoHecho;
                $("#totalDescuento").html(desctoHecho);
                $("#totalVenta").html(valorPostDescto);

            }
        }
    )
    .fail(function(e)
    {
        msjes_swal("Error al cargar ID de la venta: ",e,"error");
    })
}