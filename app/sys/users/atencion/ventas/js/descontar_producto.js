

function descontarProducto()
{
    idVenta = $("#id_venta").text();
    
    return $.ajax(
        {
            url: "func_php/descontar_producto.php",
            data: {"id_venta": idVenta},
            type: "POST",
            async: false
        }
    ).responseText;
}