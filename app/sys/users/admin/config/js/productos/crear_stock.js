/* ---------------------------------------- FUNCION AJAX -------------------------------------------- */

function modificarEstadoStockAjax(estado, stock_min)
{
    return $.ajax({
        url:"script_php/config_stock/stock_productos.php",
        data: {"estado":estado, "stock_min":stock_min},
        type: "POST",
        async: false
    }).responseText;
}

/* ----------------------------------------- FUNCION DOM -------------------------------------------- */
$("#btnGuardarStock").on("click", function(e)
{
    let stock_min = $("#txtNumMinimoStock").val();
    
    let respuesta = modificarEstadoStockAjax(estado, stock_min);
    let json = JSON.parse(respuesta);


    msjes_swal(json.titulo, json.mensaje, json.icono);
    if(json.edicion_stock)
    {
        $("#modalConfProd").modal("hide");
    }
})
