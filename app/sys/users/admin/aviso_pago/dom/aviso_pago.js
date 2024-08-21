
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
    let j = JSON.parse(dias);
    if(j.dias_restantes<=7&&j.dias_restantes>=3)
    {
        $("#advertenciaSuscripcion").show();
        $("#diasPago").html(j.mostrar_dias)
        $("#diaLimite").html(j.fecha_final);
    }
    if(j.dias_restantes<=2)
    {
        $("#advertenciaSuscripcion").show();
        $("#advertenciaSuscripción").removeClass(".alert-warning");
        $("#advertenciaSuscripción").addClass(".alert-danger");
        $("#diasPago").html(j.mostrar_dias)
        $("#diaLimite").html(j.fecha_final);
    }
    
}