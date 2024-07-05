function obtenerNombrePedido(id_pedido)
{
    return $.ajax({
        url: "funciones/pedido/read/read_nombre_pedido.php",
        data: {"id_pedido": id_pedido},
        type: "POST",
        async: false
    }).responseText;
}