

function validarExistenciaProveedor(rut)
{
    return $.ajax({
        url: "func_php/comprobar_existencia_rut.php",
        data: {"rut": rut},
        type: "POST",
        async: false
    }).responseText;
}