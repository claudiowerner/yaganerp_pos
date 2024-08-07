
function validarRut(rut)
{
    return $.ajax({
        url: "php/cliente/clientes/validar_rut.php",
        data: {"rut": rut},
        type: "POST",
        async: false
    }).responseText;
}