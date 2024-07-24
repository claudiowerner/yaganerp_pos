

//Accion al intentar eliminar venta
function accionEliminarVenta(id)
{
    $("#anVenta").text(id);
    let configClave = leerConfigClave()
    
    if(configClave.match("S"))
    {
        $("#solicClaveAut").modal("show");
    }
    else
    {
        let descargarRespuesta = eliminarVenta(id);
        let jsonRes = JSON.parse(descargarRespuesta);

        if(jsonRes.eliminar_venta)
        {
            cargarVentasCaja();
            $('#solicClaveAut').modal('hide');
        }
        
        if(jsonRes.error)
        {
            console.error(jsonRes.error);
        }
    }
}