function obtener_id_venta()
{
    return $.ajax({
        url: "func_php/venta/obtener_id_item_venta.php",
        type: "POST",
        async: false
    }).responseText;
}