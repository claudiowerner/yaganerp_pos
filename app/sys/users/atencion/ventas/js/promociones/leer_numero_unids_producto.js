function leerUnidadesPromo(id_prod)
{
    return $.ajax({
        url: "func_php/promociones/leer_unids_producto_promocion.php",
        data: {"id_prod": id_prod,}, 
        type: "POST",
        async: false
    }).responseText;
}