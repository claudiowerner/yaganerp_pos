function cargarIDUsuario(dir)
{
    id_usuario = "";
    //obtener ID de usuario/cliente
    $.ajax(
        {
            url: dir+"user.php",
            type: "POST",
            async:false,
            success: function(e)
            {
                id_usuario = e;
            }
        }
    )
    return id_usuario;
}