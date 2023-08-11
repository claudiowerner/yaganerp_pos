function registrarCuenta(rut)
{

    let correlativo = $("#id_venta").text();
    let fecha = getFechaBD();
    let valor = $("#totalVenta").text();
    
    let datos = {
        "rut":rut,
        "corr": correlativo,
        "fecha": fecha,
        "valor": valor
    }
    //se pregunta si desea añadir la venta a la cuenta del cliente seleccionado

    swal({
        title: "¿Seguro?",
        text: 
        `¿Desea agregar esta venta a la cuenta de este cliente ${rut}?`,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((pagar) => {
        if (pagar)
        {
            $("#btnCrearVenta").prop("disabled", false)
            //insertar datos en tabla cuenta_corriente
            $.ajax({
                url: "func_php/agregar_registro_cuenta.php",
                data: datos,
                type: "POST",
                success: function(e)
                {

                    msjes_swal("Excelente", e, "success");
                    //imprimir ticket
                    imprimirBoleta("ticket_fiado.php", correlativo);
                }
            })
            .fail(function(e)
            {
                msjes_swal("Error", e, "error");
            })
        } 
        else 
        {
            swal("Operación cancelada");
        }
    });

    

}