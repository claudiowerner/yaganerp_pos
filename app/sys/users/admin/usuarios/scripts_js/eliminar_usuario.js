/* ------------------------------------------ FUNCIONES AJAX ------------------------------------------- */
function eliminarUsuarioAjax(id)
{
    let respuesta = $.ajax({
        url: "scripts/eliminar_usuario.php",
        data: {"id":id},
        type: "POST",
        async: false
    }).responseText;
    return respuesta;
}



function eliminarUsuario(id, tipo_usuario,user)
{
    swal({
        title: "¿Seguro?",
        text: `¿Desea eliminar al usuario ${user}?`,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((pagar) => {
        if (pagar)
        {
            let respuesta;
            if(tipo_usuario==1)
            {
                let usuarios_admin = validarExistenciaUsuarioAdmin();
                if(usuarios_admin == 1)
                {
                    msjes_swal("Aviso", "Debe haber al menos 1 usuario administrador en el sistema", "warning");
                }
                else
                {
                    respuesta = eliminarUsuarioAjax(id);
                }
            }
            else
            {
                respuesta = eliminarUsuarioAjax(id);
            }
            let json = JSON.parse(respuesta);
            msjes_swal(json.titulo, json.mensaje, json.icono);
            $('#producto').DataTable().ajax.reload();
            cargarUsuariosActivos()
            cargarUsuariosPermitidos()
            validarUsuariosActivos()
        } 
        else 
        {
            swal("Operación cancelada");
        }
    });
}