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


//Accion al intentar eliminar venta
async function accionEliminarVenta(id)
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

        if(jsonRes.eliminarVenta)
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