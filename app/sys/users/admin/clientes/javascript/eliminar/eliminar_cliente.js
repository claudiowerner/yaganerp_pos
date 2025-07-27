

/* ---------------------------------- ELIMINAR CLIENTE DESDE EL DOM ----------------------------------*/

function eliminarCliente(rut, nombre)
{
    swal({
        title: "¿Seguro?",
        text: 
        `¿Desea eliminara a ${nombre}?`,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((eliminar) => {
        if (eliminar)
        {
            let contar_cuentas = parseInt(validarCuentasActivasBD(rut));
            if(contar_cuentas==0)
            {
                eliminarClienteBD(rut);
            }
            else
            {
                msjes_swal("Aviso", "El cliente posee cuentas sin pagar", "warning");
            }
            $("#producto").DataTable().ajax.reload();
        }
        else
        {
            msjes_swal("Operación cancelada");
        }
    })
}