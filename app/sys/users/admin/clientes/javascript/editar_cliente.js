

/* ---------------------------------------- CONEXIÓN A LA BD --------------------------------------- */
function editarClienteBD()
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

    return $.ajax({
        url: "funciones/editar_cliente.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText
}


/* ---------------------------------------------- MODAL -------------------------------------------- */

function editarCliente(id, rut, nombre, apellido)
{
    $("#idCliente").html(id);
    $("#modalEditar").modal("show");
    $("#txtRutClteEditar").val(rut);
    $("#txtNombreClteEditar").val(nombre);
    $("#txtApellidoEditar").val(apellido);
}

$("#btnEditar").on("click", function(e)
{
    let respuesta = editarClienteBD();
    let json = JSON.parse(respuesta);

    if(json.edicion)
    {
        $("#modalEditar").modal("hide");
    }

    msjes_swal(json.titulo, json.mensaje, json.icono);
    $("#producto").DataTable().ajax.reload();
})
