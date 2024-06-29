


//conexion y envío de datos al servidor
function pagarCuenta(array)
{
    let datos =
    {
        "array": array,
        "fecha": getFechaBD() +" "+ getHora()
    }
    return $.ajax({
        url: "func_php/pagos/pagar_cuentas.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText;
}


/*Acciones pagar venta. Funcion que oculta el modal de seleccionar las cuentas, 
y abre el modal con el método de pago de las cuentas*/
function realizar_pago()
{
    $("#modalMetodoPagoPagarCuenta").modal("show");
    $("#modalSeleccionarCuenta").modal("hide");

    console.log(arrayPagarTotalCuentas);
}

function realizar_pago_bd()
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