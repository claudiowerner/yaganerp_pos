

function validarCuentasActivasBD(rut)
{
    return $.ajax({
        url: "funciones/contar_cuentas_pendientes_clte.php",
        data: {"rut": rut},
        type: "POST",
        async: false
    }).responseText;
}