

//obtener valor pedido
function obtenerValorPedido(id)
{
    return $.ajax({
        url: "funciones/pedido/read/read_valor_pedido.php",
        data: {"id_pedido": id},
        type: "POST",
        async: false
    }).responseText;
}