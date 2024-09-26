
/* ---------------------------------------------- FUNCION AJAX ----------------------------------------------- */
function descargarDiasPagoAjax(url)
{
    return $.ajax({
        url: url,
        type: "POST",
        async: false
    }).responseText;
}


/* ----------------------------------------------- FUNCION DOM ----------------------------------------------- */
function advertenciaSistema(url)
{
    //descargar número de días previos al vencimiento del pago
    let dias = descargarDiasPagoAjax(url);
    console.log(dias)
    let j = JSON.parse(dias);

    if(j.dias_restantes<=7&&j.dias_restantes>=3)
    {
        $("#advertenciaSuscripcion").show();
        $("#diasPago").html(j.mostrar_dias)
        $("#diaLimite").html(j.fecha_final);
    }
    if(j.dias_restantes<=2)
    {
        $("#advertenciaCorte").show();
        $("#diasPagoCorte").html(j.mostrar_dias)
        $("#diaLimiteCorte").html(j.fecha_final);
    }
    if(j.dias_restantes<=0)
    {
        $("#advertenciaSuscripcion").hide();
        $("#sistemaBloqueado").show();
        $("#pantallaPrincipal").hide();
        $("#session").hide();
        $("#menu_sistema").hide();
    }
    
    
}