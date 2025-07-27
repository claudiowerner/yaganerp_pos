/* -------------------------------------- CONEXION CON LA BD --------------------------------------- */

function eliminarClienteBD(rut)
{
    $.ajax({
        url: "funciones/eliminar_cliente.php",
        data: {"rut": rut},
        type: "POST",
        success: function(e)
        {
            let j = JSON.parse(e);
            msjes_swal(j.titulo, j.mensaje, j.icono);
        }
    })
}