/*función que cierra la edición inicial del pedido 
(se cierra la edición del pedido al agregar el primer detalle)*/

function cerrarEdicionPedido(id_pedido)
{
    return $.ajax({
        url:"funciones/pedido/editar/editar_estado_edicion.php",
        data: {"id_pedido": id_pedido},
        type: "POST",
        async: false
    }).responseText
}