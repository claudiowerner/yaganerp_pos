function enviar_sugerencia()
{
    let sugerencia = $("#txtSugerencia").val();
    $.ajax({
        url: "sugerencias/php/enviar_sugerencia.php",
        data: {"sugerencia": sugerencia},
        type: "POST",
        success: function(e)
        {
            let j = JSON.parse(e);
            msjes_swal(j.titulo, j.mensaje, j.icono);
            if(j.registro)
            {
                $("#modalSugerencias").modal("hide");
            }
        }
    })
}