


/* -------------------------------------------- FUNCIONES DOM ------------------------------------------ */

function abrirModalPagos(id)
{
    $("#idCliente").html(id);
    $("#modalComprobantesPago").modal("show");
    cargarArchivosComprobantes(id);
}