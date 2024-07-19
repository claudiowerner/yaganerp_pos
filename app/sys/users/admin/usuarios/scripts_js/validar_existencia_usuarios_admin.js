

/* ------------------------------------------ FUNCION AJAX ------------------------------------------- */
function validarExistenciaUsuarioAdmin()
{
    return $.ajax({
        url: "scripts/validar_existencia_usuarios_admin.php",
        type: "POST",
        async: false
    }).responseText;
}