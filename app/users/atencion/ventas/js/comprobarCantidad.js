
function comprobarCantidad(producto)
{
    let retorno;
    $.ajax(
        {
            url: "func_php/comprobar_cantidad_venta.php",
            data: {"idProd":producto},
            type: "POST",
            async: false,
            success: function(e)
            {
                alert("Comprobar cantidad: "+e)
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