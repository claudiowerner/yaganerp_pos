//obtener número de ventas seleccionadas a pagar 
function contadorVentas(id_venta)
{
    $.ajax({
        url:"func_php/contador_ventas_pagadas.php?id_venta="+id_venta,
        type:"GET",
        success: function(e)
        {
            let resp = parseInt(e);
            if(resp==ventasCheckeadas||resp==0)
            {
                pagarVenta(true);
            }
        }
    })
    .fail(function(e)
    {
        msjes_swal("Error", e.responseText, "error");
    })
}