

function abrirModalEditarPago(id_pago, id_cl, plan, metodo, plazo)
{
    $("#idPagoEditar").html(id_pago);
    $("#idClienteEditar").html(id_cl);
    $("#modalEditarPagos").modal("show");

    $("#slctMetodoPagoEditar").val(metodo);
    $("#slctPeriodoPagoEditar").val(plazo);
    $("#slctPlanContratadoEditar").val(plan);

    calcularPrecioPagoEditado();
}