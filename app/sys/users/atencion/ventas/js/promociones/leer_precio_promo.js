function obtenerPrecioPromo(id_promo)
{
    return $.ajax({
        url: "func_php/promociones/leer_precio_promo.php",
        data: {"id_promo": id_promo},
        type: "POST",
        async: false
    }).responseText;
}