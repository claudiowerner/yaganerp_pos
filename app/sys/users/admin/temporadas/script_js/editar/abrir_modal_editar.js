function abrirModalEditar(id, nombre)
{
    $("#idTemporada").html(id);
    $("#nomCajaEditar").val(nombre);
    $("#modalEditar").modal("show")
}