//descargar dias de compra
function descargarDiaCompra(mes, año)
{
    return $.ajax(
        {
            url: "func_php/imprimir/dia_boleta/dia_mes_boleta.php",
            data: {"mes_actual": mes, "año_actual": año},
            type: "POST",
            async: false
        }
    ).responseText;
}

//impresión de calendario de días de venta
function calendario(año, mes)
{
    //llamada al modal de fechas
    $("#modalDiaBoleta").modal("show");
    $("#modalMesBoleta").modal("hide");
    //obtención de datos

    //--------------------------Generar calendario-----------------------------

    //llamada a la funcion de renderizado de la estructura del calendario
    renderizarCalendario(año, mes)

    //renderizar días de venta
    let descargarDia = descargarDiaCompra(mes, año);
    let json = JSON.parse(descargarDia);

    //verificar y habilitar los botones de las fechas que si tengan ventas
    if(Array.isArray(json))
    {
        json.forEach(j=>{
            console.log(`#${año}-${mes}-${j.fecha}`);
            $(`#${año}-${mes}-${j.fecha}`).prop("disabled", false);
        })
    }


}

