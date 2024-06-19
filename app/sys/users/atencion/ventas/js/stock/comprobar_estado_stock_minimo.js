
function comprobarEstadoStockMinimo()
{
    return $.ajax(
        {
            url: "func_php/comprobar_estado_stock_minimo.php",
            type: "POST",
            async: false,
        }
    ).responseText;
}