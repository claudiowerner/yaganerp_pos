/* -------------------------------------- CONEXION CON LA BD --------------------------------------- */

function eliminarClienteBD(rut)
{
    return $.ajax({
        url: "funciones/eliminar_cliente.php",
        data: {"rut": rut},
        type: "POST",
        async: false
    }).responseText;
}

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
                let eliminar = eliminarClienteBD(rut);
                let json = JSON.parse(eliminar);
                msjes_swal(json.titulo, json.mensaje, json.icono);
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