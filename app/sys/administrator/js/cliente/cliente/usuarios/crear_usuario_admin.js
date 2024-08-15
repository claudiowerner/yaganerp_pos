/* ------------------------------------------------ FUNCION AJAX ------------------------------------------------ */
function crearUsuarioAjax(datos)
{
    id = datos.id;
    $("#credencialCliente"+id).prop("disabled", true)
    $("#creandoUsuario").toggleClass('fa-user').toggleClass("fa-spinner");
    $.ajax({
        url: "php/cliente/usuarios/crear_usuario_admin.php",
        data: datos,
        type: "POST",
        success: function(e)
        {
            let j = JSON.parse(e);
            if(j.registro&&j.clave_provisoria&&j.correo)
            {
                msjes_swal("Excelente", "Se ha creado el usuario administrador para "+datos.nombre+" y se ha enviado un correo con sus credenciales.", "success");
                $('#producto').DataTable().ajax.reload();
            }
            else
            {
                if(!j.registro)
                {
                    msjes_swal("Error", "Se produjo un error al crear el usuario.", "error");
                }
                if(!j.clave_provisoria)
                {
                    msjes_swal("Error", "Se produjo un error al crear la clave provisoria.", "error");
                }
                if(!j.correo)
                {
                    msjes_swal("Error", "Se produjo un error al enviar el correo con las credenciales.", "error");
                }
            }
                    
            $("#credencialCliente"+id).prop("disabled", false)
            $("#creandoUsuario").toggleClass("fa-spinner").toggleClass('fa-user');
        }
    })
    .fail(function(e)
    {
        console.error(e)
    });
}



/* ------------------------------------------------- FUNCION DOM ------------------------------------------------ */
function crearUsuarioAdmin(id, nombre, correo)
{
    let datos = {
        "id": id,
        "nombre": nombre,
        "correo": correo
    }
    crearUsuarioAjax(datos)
}