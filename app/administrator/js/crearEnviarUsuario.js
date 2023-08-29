$("#btnCrearAdmin").on("click", function(e)
{
    $("#btnCrearAdmin").val('Enviando correo...');
    e.preventDefault();
    let idCliente = $("#idCliente").text();
    let correo = $("#correoEditar").val();
    alert(idCliente+" "+correo)

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
                alert(e);
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
        alert(e)
        msjes_swal("Error",e.responseText,"error")
    })
})