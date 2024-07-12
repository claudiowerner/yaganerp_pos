function obtenerPesaje(id)
{
    return $.ajax({
        url: "funciones/obtener_pesaje.php",
        data: {"id": id},
        type: "POST",
        async: false,
    }).responseText;
}