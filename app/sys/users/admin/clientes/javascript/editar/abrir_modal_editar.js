function editarCliente(id, rut, nombre, apellido, telefono)
{
    $("#idCliente").html(id);
    $("#modalEditar").modal("show");
    $("#txtRutClteEditar").val(rut);
    $("#txtNombreClteEditar").val(nombre);
    $("#txtApellidoEditar").val(apellido);
    $("#txtTelefonoEditar").val(telefono);
}