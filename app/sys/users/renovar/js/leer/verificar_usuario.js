function verificar_usuario()
{
    let usuario = $("#t_user").val()
    
    $.ajax({
        url: "php/leer/verificar_usuario.php",
        data: {"user": usuario},
        type: "POST",
        beforeSend: function(e)
        {
            $('#buscandoUsuario').show();
        },
        success: function(e)
        {
            let j = JSON.parse(e);
            if(j.usuarios)
            {
                $("#t_pass").prop("disabled", false);
                $("#t_pass2").prop("disabled", false);
            }
            else
            {
                $("#t_pass").prop("disabled", true)
                $("#t_pass2").prop("disabled", true)
            }
            $("#alert_usuario").html(j.contenido);
            $('#buscandoUsuario').hide();
        }
    })
}