

function cargarDia(año, mes)
{
    $("#modalDiaVenta").modal("show");
    $("#modalMesVenta").modal("hide");
    renderizarCalendario(año, mes)
}