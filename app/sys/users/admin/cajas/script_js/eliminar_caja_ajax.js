/* ------------------------------------ PROCEDIMIENTO EN BD -------------------------------- */

function eliminarCajaBD(id)
{
    return $.ajax({
        url:"script_php/eliminar_caja.php",
        data: {"idCaja": id},
        type: "POST",
        async: false
    }).responseText;
}
