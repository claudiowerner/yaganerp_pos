function leerUnidadesVenta(id_prod, id_venta)
{
    let datos = {
        "id_prod": id_prod,
        "id_venta": id_venta
    };
    return $.ajax({
        url: "func_php/promociones/leer_unids_producto_venta.php",
        data: datos, 
        type: "POST",
        async: false
    }).responseText;
}