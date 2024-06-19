//validar si el id del método de pago corresponde a Efectivo o no
vueltoEfectivo();

function vueltoEfectivo()
{
    let metodo_pago = $("#metodoPagoGral").val();
    if(metodo_pago!=1)
    {
        $("#tblMontoVuelto").hide();
    }
    else
    {
        $("#tblMontoVuelto").show();
    }
}

//operaciones de cálculo

$("#txtMontoPago").on("keyup", function(e)
{
    let totalVenta = parseInt($("#totalVenta").text());
    let montoPago = $("#txtMontoPago").val();
    let resultado = parseInt(montoPago) - parseInt(totalVenta);

    $("#lblResultadoVuelto").html(resultado);

})