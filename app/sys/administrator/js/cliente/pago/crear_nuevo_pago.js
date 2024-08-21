
/* --------------------------------------------------- FUNCION AJAX ----------------------------------------------- */
function crearNuevoPago()
{
    return $.ajax({
        url: "php/cliente/pagos/crear_nuevo_pago.php",
        type: "POST"
    }).responseText;
}