function obtenerIDUsuario()
{
    $.ajax({
        url: "../../user.php",
        type: "POST",
        async:false,
        success: function(e)
        {
            id_usuario = e;
        }
    }).responseText;
}