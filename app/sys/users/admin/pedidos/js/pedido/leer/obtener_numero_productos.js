

//obtener valor pedido
function obtenerNumeroProductos(id)
{
    return $.ajax({
        url: "funciones/pedido/read/pedido/read_num_productos.php",
        data: {"id_pedido": id},
        type: "POST",
        async: false
    }).responseText;
}