/* ----------------------------------------- FUNCIONES AJAX ---------------------------------------- */
function eliminaProductoAjax(id, fecha)
{
    let datos = {
        "id": id,
        "fecha": fecha
    };
    return $.ajax({
        url: "funciones/eliminar_producto.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText;
}



/* ----------------------------------------- FUNCIONES DOM ----------------------------------------- */

function eliminarProducto(id, nombre)
{
    swal({
        title: "¿Está seguro?",
        text: `¿Desea eliminar el producto '${nombre}'?`,
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((pagar) => {
        if (pagar)
        {
            let fecha_hora = getFechaBD()+" "+getHora();    
            let respuesta = eliminaProductoAjax(id, fecha_hora);
            let json = JSON.parse(respuesta);

            msjes_swal(json.titulo, json.mensaje, json.icono);

            if(json.eliminar)
            {
                $('#producto').DataTable().ajax.reload();
            }
        }
        else 
        {
            msjes_swal("Operación cancelada");
        }
      });
}