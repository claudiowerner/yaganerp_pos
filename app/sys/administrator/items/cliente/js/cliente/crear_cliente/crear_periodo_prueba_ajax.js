function crear_periodo_prueba_ajax(datos)
{
    return $.ajax({
        url: "php/cliente/pagos/crear_periodo_prueba.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText;
}