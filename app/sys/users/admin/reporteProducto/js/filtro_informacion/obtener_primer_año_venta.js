
/* ---------------------------------------- FUNCION AJAX -------------------------------------------- */
function obtenerPrimerAñoVenta()
{
    return $.ajax({
        url: "funciones_php/obtener_primer_año_venta.php",
        type: "POST",
        async: false
    }).responseText;
}