//valida si se ha seleccionado una opción de pago válida 

//metodo onChange()
function activarBotonCuentaGral(e)
{
    vueltoEfectivo(e.value);
    if(e.value=='SO')
    {
        $("#btnConfirmarPaga").prop("disabled", true);
    }
    else
    {
        $("#btnConfirmarPaga").prop("disabled", false);
    }
}

function activarBotonPagarCuenta(e)
{
    if(e.value=='SO')
    {
        $("#btnConfirmarPagaCuenta").prop("disabled", true);
    }
    else
    {
        $("#btnConfirmarPagaCuenta").prop("disabled", false);
    }
}



