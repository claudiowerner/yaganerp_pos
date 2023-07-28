
let estado = "";
let stock_min = "";

//Cargar valores en pantalla sobre la configuracion del stock de productos

$.ajax(
    {
        url:"config_stock/read_config_productos.php",
        type: "POST",
        success: function(e)
        {
            json = JSON.parse(e)
            json.forEach(s=>
                {
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
})



$("#swStockProductos").on("click", function(e)
{
    stock_min = $("#txtNumMinimoStock").val();
    if(e.target.checked)
    {
        estado = "S";
        $("#txtNumMinimoStock").attr("disabled",false);
    }
    else
    {
        estado = "N";
        $("#txtNumMinimoStock").attr("disabled",true);
    }
})

$("#btnGuardarStock").on("click", function(e)
{
    stock_min = $("#txtNumMinimoStock").val();
    modificarEstadoStock(estado, stock_min);
})

function modificarEstadoStock(estado, stock_min)
{
    $.ajax({
        url:"config_stock/stock_productos.php",
        data: {"estado":estado, "stock_min":stock_min},
        type: "POST",
        success: function(e)
        {
            msjes_swal("Excelente", e, "success");
            swal({
                title: "Excelente",
                text: e,
                icon: "success",
              });
            $("#modalConfProd").modal("hide");
            cargarDatosComanda();
        }
    })
}