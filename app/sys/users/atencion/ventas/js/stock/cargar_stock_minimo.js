

function obtenerStockMinimo()
{
    return $.ajax({
        url: "func_php/cargar_stock_minimo.php",
        type: "POST",
        async: false,
    }).responseText;
}