$("#btnEditar").on("click", function(e)
{
    let rut = $("#txtRutClteEditar").val();
    let nombre = $("#txtNombreClteEditar").val();
    let apellido = $("#txtApellidoEditar").val();
    let id = $("#idCliente").text();

    let datos = {
        "id": id,
        "rut": rut,
        "nombre": nombre,
        "apellido": apellido
    }
    editarClienteBD(datos);
})
