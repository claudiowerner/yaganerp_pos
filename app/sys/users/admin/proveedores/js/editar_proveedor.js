/* ----------------------------------------- FUNCION AJAX -------------------------------------------- */
function editarProveedorAjax(id, rut, nombre)
{
    datos = {
        "id": id,
        "rut": rut,
        "nombre": nombre,
        "hora": getHora()
    }


    return $.ajax({
        url:"func_php/editar_proveedor.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText;
}




/* --------------------------------------------- ACCIONES DOM ---------------------------------------- */


function abrirModalEditarProveedor(id, rut, nombre)
{
    $("#modalEditar").modal("show");
    $("#idProv").html(id);
    $("#txtRutProveedorEditar").val(rut);
    $("#txtNombreProveedorEditar").val(nombre)
}

$("#btnEditar").on("click",function(e)
{
    e.preventDefault();
    let id = $("#idProv").val();
    let rut = $("#txtRutProveedorEditar").val();
    let nombre = $("#txtNombreProveedorEditar").val();

    let respuesta = editarProveedorAjax(id, rut, nombre)
    let json = JSON.parse(respuesta);

    msjes_swal(json.titulo, json.mensaje, json.icono);

    if(json.edicion)
    {
        $('#producto').DataTable().ajax.reload();
        $("#modalEditar").modal("hide");
    }

});
