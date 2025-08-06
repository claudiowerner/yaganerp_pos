function buscar_datos_usuario(user)
{
    return $.ajax({
		url: "php/seguridad/crear/buscar_datos_usuario.php",
		data: {"user": user},
		type: "POST",
        async: false
	}).responseText;
}