


/* -------------------------------------------- FUNCIONES DOM ------------------------------------------ */

function abrirModalComprobantes(id)
{
    $("#idCliente").html(id);
    $("#modalComprobantesPago").modal("show");
    cargarArchivosComprobantes(id);
    cargarPeriodosComprobante(id);
}