


/* -------------------------------------------- FUNCIONES DOM ------------------------------------------ */

function abrirModalComprobantes(id)
{
    $("#idClientePagar").html(id);
    $("#modalComprobantesPago").modal("show");
    cargarArchivosComprobantes(id);
    cargarPeriodosComprobante(id);
}