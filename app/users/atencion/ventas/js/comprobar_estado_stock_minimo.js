
function comprobarEstadoStockMinimo()
{
    let retorno = 0;
    $.ajax(
        {
            url: "func_php/comprobar_estado_stock_minimo.php",
            type: "POST",
            async: false,
            success: function(e)
            {
                retorno = e;
            }
        }
    )
    .fail(function(e)
    {
        console.log(e.responseText);
    })
    return retorno;
}