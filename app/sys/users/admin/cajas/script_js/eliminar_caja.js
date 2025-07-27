

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
                let j = JSON.parse(respuesta);
                msjes_swal(j.titulo, j.mensaje, j.icono);
                cargarCajasActivas();
                if(j.eliminar)
                {
                    $('#producto').DataTable().ajax.reload();
                    $("#msjesCajasActivas").hide();
                    validarCajasActivas();
                }
            }
            else 
            {
                msjes_swal("Operación cancelada");
            }
        });
    }
}




