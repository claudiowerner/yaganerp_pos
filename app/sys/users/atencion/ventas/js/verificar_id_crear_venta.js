$(document).on("ready", function()
{
    //obtener ID de venta
    debugger;
    let numero_caja = $("#nCaja").text();
    let id = parseInt(cargarIDVentaCaja(numero_caja));

    //Verificar si el ID obtenido es numérico o no
    if(Number.isInteger(id))
    {
        $("#id_venta").html(id);
    }
    else
    {
        correlativo();
    }

    cargarVentasCaja();
})