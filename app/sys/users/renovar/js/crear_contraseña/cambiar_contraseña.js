function cambiar_contraseña()
{
    let user = $("#t_user").val();
    let pass = $("#t_pass").val();

    let datos = {
        "user": user,
        "pass": pass
    }

    $.ajax({
        url: "php/crear_contraseña/crear_contraseña.php",
        data: datos,
        type: "POST",
        success: function(e)
        {
            let j = JSON.parse(e);
            if(j.cambio == true)
            {
                $("#correcto").show();
                $("#mensaje").hide();
            }
            else
            {
                $("#error").show();
                $("#mensaje").hide();
            }
        }
    })
}