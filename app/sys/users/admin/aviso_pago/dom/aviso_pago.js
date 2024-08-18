
/* ---------------------------------------------- FUNCION AJAX ----------------------------------------------- */
function descargarDiasPagoAjax()
{
    return $.ajax({
        url: "aviso_pago/server/aviso_pago.php",
        type: "POST",
        async: false
    }).responseText;
}


/* ----------------------------------------------- FUNCION DOM ----------------------------------------------- */

//descargar número de días previos al vencimiento del pago
let dias = descargarDiasPagoAjax();
let j = JSON.parse(dias);
if(j.dias_restantes<=7)
{
    $("#advertenciaSuscripcion").show();
    $("#diasPago").html(j.mostrar_dias)
    $("#diaLimite").html(j.fecha_final);
}
if(j.dias_restantes<=3)
{
    $("#advertenciaSuscripcion").show();
    $("#diasPago").html(j.mostrar_dias)
    $("#diaLimite").html(j.fecha_final);
    $("#advertenciaSuscripcion").toggleClass('alert-warning').toggleClass("alert-danger");
}
else
{
    $("#advertenciaSuscripcion").hide();
}
