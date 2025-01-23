

$("#btnConfirmarEliminarVenta").on("click", function(e)
{
    let id_venta = $("#anVenta").text();
    
    let clave = $("#clave").val();
    if(clave=="")
    {
        msjes_swal("Aviso", "Debe indicar la clave para autorizar", "warning");
    }
    else
    {
        let respuesta = eliminarVenta(id_venta);
        let json = JSON.parse(respuesta);

        msjes_swal(json.titulo, json.mensaje, json.icono)
        
        if(json.eliminar_venta)
        {
            cargarVentasCaja();
        }
    }
})