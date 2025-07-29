function obtenerCierresCajaFiltradaAjax(desde, hasta)
{
    return $.ajax({
        url: "php/leer/read_cierre_caja_filtrada.php?desde="+desde+"&hasta="+hasta,
        type: "GET",
        async: false
    }).responseText;
}
