function obtenerCierresCajaAjax()
{
    return $.ajax({
        url: "php/leer/read_cierre_caja.php",
        type: "GET",
        async: false
    }).responseText;
}