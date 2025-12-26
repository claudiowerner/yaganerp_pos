//funcion que devuelve si el pedido está vacío o no
function comprobarPedidoVacio(id)
{
    return $.ajax({
        url:"funciones/pedido/read/comprobar_pedido_vacio.php",
        data: {"id_pedido": id},
        type: "POST",
        async: false
    }).responseText
}