function validarUsuarioExistente(nombre)
{
    return $.ajax({
        url: "scripts/validar_usuario_existente.php",
        data: {"nombre": nombre},
        type: "POST",
        async: false
    }).responseText;
}