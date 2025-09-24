function obtener_id_prod_promocion(id_detalle)
{
    return $.ajax({
        url: "func_php/promociones/obtener_id_producto.php",
        data: {"id_detalle": id_detalle},
        type: "POST",
        async: false
    }).responseText;
}