/* ----------------------------------------- FUNCIONES AJAX ------------------------------------------- */
function cargarConfiguracionProductosAjax()
{
    return $.ajax({
        url:"script_php/config_stock/read_config_productos.php",
        type: "POST",
        async: false
    }).responseText;
}


/* ----------------------------------------- FUNCIONES DOM -------------------------------------------- */

function cargarConfiguracionProductos()
{
    let descarga = cargarConfiguracionProductosAjax();
    let json = JSON.parse(descarga)
    json.forEach(s=>{
        if(s.estado == "S")
        {
            $("#swStockProductos").prop("checked",true);
            $("#txtNumMinimoStock").attr("disabled",false);
        }
        else
        {
            $("#swStockProductos").prop("checked",false);
            $("#txtNumMinimoStock").attr("disabled",true);
        }
        $("#txtNumMinimoStock").val(s.stock_minimo)
    })
}