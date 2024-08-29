/* ------------------------------------------------ FUNCTION AJAX ------------------------------------------------ */
function editarPagoAjax(pago, cl, metodo, periodo, plan)
{
    let datos = {
        "pago": pago, 
        "cl": cl, 
        "metodo": metodo, 
        "periodo": periodo,
        "plan": plan
    }
    return $.ajax({
        url: "php/cliente/pagos/editar_pago.php", 
        data: datos, 
        type: "POST",
        async: false
    }).responseText;
}



/* ------------------------------------------------- FUNCION DOM -------------------------------------------------- */
$("#btnEditarPago").on("click", function(e)
{
    let pago = $("#idPagoEditar").text();
    let cl = $("#idClienteEditar").text();
    
    let metodo = $("#slctMetodoPagoEditar").val();
    let periodo = $("#slctPeriodoPagoEditar").val();
    let plan = $("#slctPlanContratadoEditar").val();

    if(metodo==0||periodo==0||plan==0)
    {
        msjes_swal("Aviso", "El método de pago, Periodo de pago o Plan contratado, debe ser una opción válida.", "warning");
    }
    else
    {
        swal({
            title: "¿Está seguro?",
            text: `¿Desea editar el pago '${pago}'?`,
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((pagar) => {
            if (pagar)
            {
                let respuesta = editarPagoAjax(pago, cl, metodo, periodo, plan);
                let j = JSON.parse(respuesta);
                msjes_swal(j.titulo, j.mensaje, j.icono);
                if(j.editar)
                {
                    $("#modalEditarPagos").modal("hide");
                    $('#tablaPagos').DataTable().ajax.reload();
                }
            }
            else 
            {
                msjes_swal("Operación cancelada");
            }
        });
    }

    /**/
})