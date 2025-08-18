
function comprobarCantidad(producto)
{
    return $.ajax(
        {
            url: "func_php/venta/comprobar_cantidad_venta.php",
            data: {"idProd":producto},
            type: "POST",
            async: false,
        }
    ).responseText;
}