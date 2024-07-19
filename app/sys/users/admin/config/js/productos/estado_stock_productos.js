let estado = "";
let stock_min = "";
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