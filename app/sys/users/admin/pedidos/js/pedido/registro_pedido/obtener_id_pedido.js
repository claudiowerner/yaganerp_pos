//funcion que carga el ID de un pedido
function obtenerIDPedido()
{
    return $.ajax({
        url:"funciones/pedido/read/pedido/cargar_id_pedido_nuevo.php",
        type: "POST",
        async: false
    }).responseText
}
