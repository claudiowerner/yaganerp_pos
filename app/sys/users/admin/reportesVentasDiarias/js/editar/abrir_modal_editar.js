
$("#cierreCaja").on("click", ".btn-primary", function(e)
{
    let nombre_caja = $(this).attr("nomCaja");
    let idCaja = $(this).attr("idCierre");
    $("#strCaja").html(idCaja);
    $("#nombreCajaEditar").val(nombre_caja);
    $("#editarCaja").modal("show");
});