
function comprobarEstadoStockMinimo()
{
    return $.ajax(
        {
            url: "func_php/stock/comprobar_estado_stock_minimo.php",
            type: "POST",
            async: false,
        }
    ).responseText;
}