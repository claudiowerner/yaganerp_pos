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


/* --------------------------------------------- MODAL DE EDICIÓN ------------------------------------ */
function eliminarCaja(idCaja, nombre)
{
    //se valida si la caja está con ventas o no, para poder o no ser eliminada.
    let caja_con_ventas = validarCajaConVentas(idCaja)
    if(caja_con_ventas!=0)
    {
        msjes_swal("Aviso", "Las cajas abiertas no se pueden eliminar", "warning");
    }
    else
    {
        swal({
            title: "¿Está seguro?",
            text: `¿Desea eliminar la caja ${nombre}?`,
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((pagar) => {
            if (pagar)
            {
                let respuesta = eliminarCajaBD(idCaja);
                let json = JSON.parse(respuesta);
                msjes_swal(json.titulo, json.mensaje, json.icono);
                cargarCajasActivas();
                $('#producto').DataTable().ajax.reload();
            }
            else 
            {
                msjes_swal("Operación cancelada");
            }
        });
    }
}




