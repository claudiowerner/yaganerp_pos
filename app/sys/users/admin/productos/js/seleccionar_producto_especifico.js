/* --------------------------- FUNCION BASE DE DATOS ------------------------------ */
function descargarProductoEspecifico(id)
{
    return $.ajax({
        url:"funciones/read_productos_especifico.php",
        type: "POST",
        data: {"id_prod":id},
        async: false
    }).responseText;
}

function abrirProductoEspecifico(id)
{
    let descarga = descargarProductoEspecifico(id) 
    let json = JSON.parse(descarga);
    
    $("#slctProveedorEditar").val(json.id_prov);
}