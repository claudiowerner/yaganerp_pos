function registrarCliente(datos)
{
    return $.ajax({
        url:"php/cliente/clientes/crear_cliente.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText;
}