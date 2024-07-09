function validarCajaConVentas(id)
{
    return $.ajax({
        url: "script_php/validar_caja_con_ventas.php",
        data: {"idCaja": id},
        type: "POST",
        async: false
    }).responseText
}
