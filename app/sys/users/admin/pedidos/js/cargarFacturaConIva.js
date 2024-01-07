//cargar estado de pedido(si se hizo o no)
function cargarFacturaConIva(id)
{
    alert(id)
    $.ajax({
        url:"funciones/read_factura_con_iva.php",
        data: {"id_pedido": id},
        type: "POST",
        success: function(e)
        {
            alert(e)
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