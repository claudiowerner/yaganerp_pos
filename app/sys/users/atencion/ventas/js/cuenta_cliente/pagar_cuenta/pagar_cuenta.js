


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

}
