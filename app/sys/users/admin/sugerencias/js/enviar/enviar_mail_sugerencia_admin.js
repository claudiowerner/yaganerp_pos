function enviar_mail_sugerencia_admin()
{
    let txt_sugerencia = $("#txtSugerencia").val();
    $.ajax({
        url: "sugerencias/php/enviar_mail_sugerencia.php",
        data: {"sugerencia": txt_sugerencia},
        type: "POST",
        success: function(e)
        {
            let j = JSON.parse(e);
            msjes_swal(j.titulo, j.mensaje, j.icono);
        }
    })
}