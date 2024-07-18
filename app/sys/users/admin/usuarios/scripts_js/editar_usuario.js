/* ------------------------------------------- FUNCIONES AJAX ---------------------------------------- */
function modificarUsuarioAjax(datos)
{
    return $.ajax(
    {
        url: "scripts/editar_usuario.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText;
}



/* -------------------------------------------- FUNCIONES DOM ---------------------------------------- */

function abrirModalEditarUsuario(id, nombre, user, tipo_usuario, permisos)
{
    permisosEditar = Array();
    $("#swAdministrarEditar").prop("checked", false);
    $("#swVenderEditar").prop("checked", false);

    $("#idUsuarioEditar").html(id);
    $("#nomUserEditar").val(nombre);
    $("#usuario").html(user);
    $("#userEditar").val(user);
    $("#slctTipoUsuarioEditar").val(tipo_usuario);

    if(permisos.match(/1/))
    {
        $("#swAdministrarEditar").prop("checked", true);
        permisosEditar.push(1);
    }
    if(permisos.match(/2/))
    {
        $("#swVenderEditar").prop("checked", true);
        permisosEditar.push(2);
    }
    $("#modalEditar").modal("show");
}




$("#btnModificar").on("click", function(e)
{
    let id = $("#idUsuarioEditar").text();
    let user_n = $("#userEditar").val();//nickname de usuario nuevo
    let nombre = $("#nomUserEditar").val();//nombre de usuario
    let pass = $("#passEditar").val();
    let cPass = $("#cPassEditar").val();
    let estado = $("#slctEstado").val();
    let tu = $("#slctTipoUsuarioEditar").val();
    permisosEditar = permisosEditar.toString();

    alert("Tipo de usuario: "+tu);

    if(pass!=cPass)
    {
        $("#passEditar").val("");
        $("#cPassEditar").val("");
        $("#passEditar").focus();
        msjes_swal("Aviso", "Las contraseñas indicadas no coinciden");
    }
    else
    {
        let datos = {
            "id": id, 
            "user_n":user_n,
            "nombre":nombre,
            "pass":pass, 
            "estado":estado,
            "tu":tu,
            "permisos":permisosEditar
        }
        let respuesta = modificarUsuarioAjax(datos);
        let json = JSON.parse(respuesta)
        $('#producto').DataTable().ajax.reload();
        
        msjes_swal(json.titulo, json.mensaje, json.icono);
        $("#modalEditar").modal("hide");

        
        cargarUsuariosActivos()
        cargarUsuariosPermitidos()
        validarUsuariosActivos()
    }
});