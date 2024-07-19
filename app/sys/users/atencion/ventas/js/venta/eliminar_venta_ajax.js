//Procesos en la BD
function eliminarVenta(id)
{
    return $.ajax({
        url: "func_php/venta/elim_venta_exe.php",
        data: {"id_venta":id},
        type: "POST",
        async: false
    }).responseText;
}
