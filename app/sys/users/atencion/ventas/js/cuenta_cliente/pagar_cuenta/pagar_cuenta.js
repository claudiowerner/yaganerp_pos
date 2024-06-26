


//conexion y envío de datos al servidor
function pagarCuenta(array)
{
    return $.ajax({
        url: "func_php/pagos/pagar_cuentas.php",
        data: {"array": array},
        type: "POST",
        async: false
    }).responseText;
}


//Acciones pagar venta. Función que hace las acciones al clickear el botón btnPagarTotalCuentas
function realizar_pago()
{
    let total_cuentas = arrayPagarTotalCuentas.length;
    let valor_total = $("#totalCuentasCliente").text();
    swal({
        title: "¿Está seguro?",
        text: `¿Desea cancelar las ${total_cuentas} por un valor de $${valor_total}?`,
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((pagar) => {
        if (pagar)
        {
            let respuesta = pagarCuenta(arrayPagarTotalCuentas);
            alert(respuesta);
        } 
        else 
        {
            msjes_swal("La operación ha sido cancelada");
        }
      });
}