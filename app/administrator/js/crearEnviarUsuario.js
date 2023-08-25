$("#btnCrearAdmin").on("click", function(e)
{
    $("#btnCrearAdmin").val('Enviando correo...');
    e.preventDefault();
    let idCliente = $("#idCliente").text();
    let correo = $("#correoEditar").val();

    $.ajax(
        {
            url:"php/cliente/crear_usuario_admin.php",
            data: {"id": idCliente, "correo": correo},
            type: "POST",
            beforeSend: function(){
                $("#btnCrearAdmin").val('Enviando correo...');
            },
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
                if(e.match(/Clave modificada correctamente./))
                {
                    msjes_swal("Excelente",e,"success");
                }
                if(e.match(/Fatal error/))
                {
                    msjes_swal("Error",e,"error");
                }
                $("#btnCrearAdmin").val('Crear usuario administrador');
            }
        }
    )
    .fail(function(e)
    {
        msjes_swal("Excelente",e,"success")
    })
})