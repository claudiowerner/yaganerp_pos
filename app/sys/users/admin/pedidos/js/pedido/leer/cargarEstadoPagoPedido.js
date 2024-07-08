//cargar estado de pedido(si se hizo o no)
function cargarEstadoPagoPedido(id)
{
    $.ajax({
        url:"funciones/pedido/read/pedido/read_estado_pago_pedido.php",
        data: {"id_pedido": id},
        type: "POST",
        success: function(e)
        {
            if(e.match("A"))
            {
                $("#swEstadoPago").prop("checked", false)
                $("#lblEstadoPago").html("Hacer");
            }
            if(e.match("C"))
            {
                $("#swEstadoPago").prop("checked", true)
                $("#lblEstadoPago").html("Hecho");
            }
        }
    })
}