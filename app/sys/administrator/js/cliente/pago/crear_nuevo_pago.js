
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

    if(metodoPago==0||periodoPago==0||planContratado==0)
    {
        msjes_swal("Aviso", "El método de pago, Periodo de pago o Plan contratado, debe ser una opción válida.", "warning");
    }
    else
    {
        let datos = {
            "id_cl": id_cl,
            "metodo": metodoPago,
            "periodo": periodoPago,
            "plan": planContratado
        }
    
        let respuesta = crearNuevoPago(datos);
        let j = JSON.parse(respuesta);
        
        msjes_swal(j.titulo, j.mensaje, j.icono);
        if(j.registro_pago)
        {
            $('#tablaPagos').DataTable().ajax.reload();
        }
    }
    
})