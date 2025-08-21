function registrarPago(datos)
{
    return $.ajax({
        url: "php/cliente/pagos/crear_primer_pago.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText;
}