let rutCliente = "";

$("#btnPagarCuenta").on("click", function(e)
{
    $("#modalPagarCuenta").modal("show");
})




$("#btnConfirmarPagaCuenta").on("click", function(e)
{
    let corr = $("#cuenta").text();
    swal({
        title: "¿Está seguro?",
        text: "¿Desea registrar el pago completo?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((pagar) => {
        if (pagar)
        {
            let metodoPago = $("#metodoPagoCuenta").val()
            confirmarPaga("ticket.php",corr, metodoPago);
            $("#modalMetodoPagoCuenta").modal("hide");
            parseoDatosCuentasCliente(rutCliente);
        } 
        else 
        {
            swal("Operación cancelada");
        }
      });
})


function selecCliente(rut)
{
    $("#modalPagarCuenta").modal("hide");
    $("#modalSeleccionarCuenta").modal("show");
    $("#spanRut").html(rut);
    parseoDatosCuentasCliente(rut);
}


function pagar(corr)
{
    $("#modalMetodoPagoPagarCuenta").modal("show");
    $("#cuenta").html(corr);
}

