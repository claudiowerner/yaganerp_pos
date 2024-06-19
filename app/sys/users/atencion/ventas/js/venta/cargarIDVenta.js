function cargarIDVentaCaja(nCaja)
{
    return $.ajax(
        {
            url:"func_php/cargarIDVenta.php",
            data: {"nCaja": nCaja},
            type: "POST",
            async: false
        }
    ).responseText;
}