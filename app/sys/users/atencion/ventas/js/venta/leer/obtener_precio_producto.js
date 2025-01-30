function obtenerPrecioProducto(id_prod)
{
    return $.ajax({
        url: "func_php/promociones/leer_precio_producto.php",
        data: {"id_prod": id_prod}, 
        type: "POST",
        async: false
    }).responseText;
}