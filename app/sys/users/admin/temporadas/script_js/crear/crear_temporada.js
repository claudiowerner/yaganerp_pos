$("#btnGuardar").click(function(e)
{
    let nt = $("#txtNombreTemporada").val();//capturar nombre de temporada ingresado

    if(nt=="")
    {
        msjes_swal("Aviso", "Debe indicar el nombre de la temporada", "warning");
    }
    else
    {
        $.ajax({
            url: "script_php/crear/crear_temporada.php",
            data: {"nt": nt},
            type: "POST",
            success: function(e)
            {
                let j = JSON.parse(e);
                msjes_swal(j.titulo, j.mensaje, j.icono);
                if(j.insercion)
                {
                    $("#modalRegistro").modal("hide");
                    $('#temporadas').DataTable().ajax.reload();
                }
            }
        })
    }    
})
