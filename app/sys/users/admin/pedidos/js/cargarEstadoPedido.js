//cargar estado de pedido(si se hizo o no)
function cargarEstadoPedido(id)
{
    $.ajax({
        url:"funciones/read_estado_pedido.php",
        data: {"id_pedido": id},
        type: "POST",
        success: function(e)
        {
            if(e.match("A"))
            {
                $("#swEstadoPedido").prop("checked", false)
                $("#lblEstadoPedido").html("Hacer");
            }
            if(e.match("C"))
            {
                $("#swEstadoPedido").prop("checked", true)
                $("#lblEstadoPedido").html("Hecho");
            }
        }
    })
}