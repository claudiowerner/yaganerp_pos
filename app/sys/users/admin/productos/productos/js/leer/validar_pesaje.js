function obtenerPesaje(id)
{
    return $.ajax({
        url: "productos/funciones/leer/obtener_pesaje.php",
        data: {"id": id},
        type: "POST",
        async: false,
    }).responseText;
}