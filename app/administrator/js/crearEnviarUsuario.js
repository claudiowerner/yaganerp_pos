$("#btnCrearAdmin").on("click", function(e)
{
    e.preventDefault();
    let idCliente = $("#idCliente").text();

    $.ajax(
        {
            url:"php/cliente/crear_usuario_admin.php",
            data: {"id": idCliente},
            type: "POST",
            success: function(e)
            {
                if(e.match(/Admin creado correctamente/))
                {
                    msjes_swal("Excelente",e,"success")
                }
                if(e.match(/Ya se creó el usuario principal/))
                {
                    msjes_swal("Aviso",e,"warning");
                }
                if(e.match(/Error al asignar usuario admin al cliente ID/))
                {
                    msjes_swal("Error",e,"error");
                }
            }
        }
    )
})