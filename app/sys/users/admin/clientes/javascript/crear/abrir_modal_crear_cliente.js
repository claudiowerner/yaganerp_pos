$("#btnAgregarCliente").on("click", function(e)
{
    $("#modalRegistro").modal("show");
    $("#txtRutClte").val("");
    $("#txtNombreClte").val("");
    $("#txtApellido").val("");
});