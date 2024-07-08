//cargar estado de pedido(si se hizo o no)
function cargarFacturaConIva(id)
{
    $.ajax({
        url:"funciones/pedido/read/factura/read_factura_con_iva.php",
        data: {"id_pedido": id},
        type: "POST",
        success: function(e)
        {
            if(e.match("N"))
            {
                $("#swFacturaConIva").prop("checked", false)
                $("#lblFacturaConIva").html("No");
            }
            if(e.match("S"))
            {
                $("#swFacturaConIva").prop("checked", true)
                $("#lblFacturaConIva").html("Si");
            }
        }
    })
}

function cargarFacturaConIvaCalculo(id)
{
    return $.ajax({
        url:"funciones/pedido/read/factura/read_factura_con_iva.php",
        data: {"id_pedido": id},
        type: "POST",
        async: false
    }).responseText;
}