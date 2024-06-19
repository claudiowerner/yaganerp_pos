function cargarNumeroStockMinimo()
{
    let retorno;
    $.ajax(
        {
            url: "func_php/cargarNumeroStockMinimo.php",
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