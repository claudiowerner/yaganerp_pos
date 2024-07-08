/* ------------------------------------ PROCEDIMIENTO EN BD -------------------------------- */

function editarCaja(nombre)
{
    let id = $("#idCaja").text()
    let datos = {
        "nomCaja": nombre,
        "idCaja": id
    }
    return $.ajax({
        url:"script_php/editar_caja.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText;
}


/* --------------------------------------------- MODAL DE EDICIÓN ------------------------------------ */
function abrirModalEditar(idCaja, nombre)
{
    $("#modalEditar").modal("show");
    $("#idCaja").html(idCaja)
    $("#nomCajaEditar").val(nombre)
}


$("#btnModificar").on("click", function(e)
{
    let nombre = $("#nomCajaEditar").val();
    if(nombre=="")
    {
        msjes_swal("Aviso", "Debe rellenar el campo de texto", "warning");
    }
    else
    {
        let respuesta = editarCaja(nombre);
        let json = JSON.parse(respuesta);

        msjes_swal(json.titulo, json.mensaje, json.icono);
        
        $('#producto').DataTable().ajax.reload();
        $("#modalEditar").modal("hide");
    }
})



