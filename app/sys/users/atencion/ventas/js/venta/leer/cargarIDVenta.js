function cargarIDVentaCaja(nCaja)
{
    return $.ajax({
        url:"func_php/venta/cargarIDVenta.php",
        data: {"nCaja": nCaja},
        type: "POST",
        async: false
    }).responseText;
}

