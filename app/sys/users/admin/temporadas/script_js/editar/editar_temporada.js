$("#btnModificar").click(function(e)
{
    let nombre = $("#nomCajaEditar").val();
    let id = $("#idTemporada").text();

    let datos = {
        "nombre": nombre,
        "id": id
    }

    $.ajax({
        url: "script_php/editar/editar_temporada.php",
        data: datos,
        type: "POST",
        success: function(e)
        {
            let j = JSON.parse(e);
            msjes_swal(j.titulo, j.mensaje, j.icono);
            if(j.edicion)
            {
                $("#modalEditar").modal("hide");
                $('#temporadas').DataTable().ajax.reload();
            }
        }
    })
})