/* -------------------------------------- FUNCIONES AJAX ------------------------------------------- */

function crearUsuario(nomUser, user, pass, tipoUsuario, permisos)
{
    let datos = {
        "nombre":nomUser,
        "user":user,
        "pass":pass,
        "tu": tipoUsuario,
        "permisos":permisos
    }
    return $.ajax({
        url:"scripts/crear_usuario.php",
        data:datos,
        type: "POST",
        async: false
    }).responseText;
}




$("#btnGuardar").on("click", function(e){
    let nomUser = $("#nomUser").val();
    let user = $("#user").val();
    let pass = $("#pass").val();
    let cPass = $("#cPass").val();
    let tipoUsuario = $("#slctTipoUsuario").val();

    //conversión del array permisos a string
    permisos = permisos.toString();
    
    if(pass==cPass)
    {
        let usuario_existente = parseInt(validarUsuarioExistente(user));
        if(usuario_existente == 0)
        {
            let respuesta = crearUsuario(nomUser, user, pass, tipoUsuario, permisos)
            let json = JSON.parse(respuesta);
    
            msjes_swal(json.titulo, json.mensaje, json.icono);
    
            if(json.registro)
            {
                $('#producto').DataTable().ajax.reload();
                $("#modalRegistro").modal("hide");
                cargarUsuariosActivos();
                validarUsuariosActivos();
            }
        }
        else
        {
            msjes_swal("Aviso", `El usuario '${user}' ya existe`, "warning");
        }
    }
    else
    {
        msjes_swal("Aviso", "Las contraseñas indicadas no coinciden.", "warning");
    }

  });
