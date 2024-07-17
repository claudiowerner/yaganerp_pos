/* ------------------------------------------- FUNCION AJAX -------------------------------------------- */

function eliminarProveedorAjax(id)
{
    let datos = {
        "id": id,
        "hora": getHora()
    }
    return $.ajax({
        url: "func_php/eliminar_proveedor.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText;
}


/* ----------------------------------------  -------------------------------------- */

function eliminarProveedor(id, nombre)
{
    swal({
        title: "¿Está seguro?",
        text: `¿Desea eliminar el proveedor '${nombre}'?`,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((pagar) => {
        if (pagar)
        {
            let pedidos_proveedor = parseInt(comprobarPedidosProveedor(id));
            if(pedidos_proveedor!=0)
            {
                msjes_swal("Aviso", `'${nombre}' no se puede eliminar porque tiene pedidos asociados`, "warning");
            }
            else
            {
                let respuesta = eliminarProveedorAjax(id);
                let json = JSON.parse(respuesta);
                msjes_swal(json.titulo, json.mensaje, json.icono);

                if(json.eliminar)
                {
                    $("#producto").DataTable().ajax.reload();
                }
            }
        }
        else 
        {
            msjes_swal("Operación cancelada");
        }
    });
}
