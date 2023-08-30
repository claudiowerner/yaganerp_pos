$("#btnCrearCredenciales").on("click", function(e)
{
    $("#btnCrearCredenciales").text('Enviando correo...');
    $("#btnCrearCredenciales").attr('disabled', true);
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
                $("#btnCrearCredenciales").text('Enviar credenciales');
                $("#btnCrearCredenciales").attr('disabled', false);
            }
        }
    )
    .fail(function(e)
    {
        msjes_swal("Error",e.responseText,"error")
    })
})