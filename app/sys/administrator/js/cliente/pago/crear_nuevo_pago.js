
/* --------------------------------------------------- FUNCION AJAX ----------------------------------------------- */
function crearNuevoPago(datos)
{
    return $.ajax({
        url: "php/cliente/pagos/crear_nuevo_pago.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText;
}

/* ---------------------------------------------------- FUNCION DOM ------------------------------------------------ */
$("#btnRegistrarPago").on("click", function(e)
{
    let metodoPago = $("#slctMetodoPago").val();
    let periodoPago = $("#slctPeriodoPago").val();
    let planContratado = $("#slctPlanContratado").val();
    let id_cl = $("#idClientePago").text();
    
    let datos = {
        "id_cl": id_cl,
        "metodo": metodoPago,
        "periodo": periodoPago,
        "plan": planContratado
    }

    let respuesta = crearNuevoPago(datos);
    alert(respuesta)
    
})