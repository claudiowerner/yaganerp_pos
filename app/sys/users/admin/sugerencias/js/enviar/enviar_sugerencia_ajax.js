function enviar_sugerencia()
{
    let sugerencia = $("#txtSugerencia").val();
    $.ajax({
        url: "sugerencias/php/enviar_sugerencia.php",
        data: {"sugerencia": sugerencia},
        type: "POST",
        success: function(e)
        {
            alert(e);
        }
    })
}