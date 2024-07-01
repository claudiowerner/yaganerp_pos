let rutCliente = "";

$("#btnPagarCuenta").on("click", function(e)
{
    $("#modalPagarCuenta").modal("show");
})




$("#btnConfirmarPagaCuenta").on("click", function(e)
{
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
            //descargar resultado proveniente de la BD
            let resultado = confirmarPagaCuenta(arrayPagarTotalCuentas);

            //parseo de la variable resultado para mostrar el mensaje proveniente del PHP
            let msj = JSON.parse(resultado);
            
            msjes_swal(msj.titulo, msj.mensaje, msj.icono);
            //si el pago es en efectivo, aparecerá un mensaje avisando el movimiento en la caja en efectivo
            if(msj.registro_movimiento)
            {
                msjes_swal("PAGO EN EFECTIVO", "El pago se registró en el movimiento de caja", msj.icono);
            }
            
            $("#modalMetodoPagoCuenta").modal("hide");
            parseoDatosCuentasCliente(rutCliente);
            arrayPagarTotalCuentas = new Array();
        } 
        else 
        {
            swal("Operación cancelada");
        }
    });
})


//array que almacena los IDs de las ventas
let arrayPagarTotalCuentas = new Array();

function selecCliente(rut)
{
    $("#modalPagarCuenta").modal("hide");
    $("#modalSeleccionarCuenta").modal("show");
    //En caso de que el arrayPagarTotalCuentas esté inicializado, se destruye o vacía
    arrayPagarTotalCuentas = new Array();

    $("#spanRut").html(rut);
    parseoDatosCuentasCliente(rut);
}


function pagar(corr)
{
    $("#modalMetodoPagoPagarCuenta").modal("show");
    $("#cuenta").html(corr);
}
