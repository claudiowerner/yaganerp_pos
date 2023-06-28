//valida si se ha seleccionado una opción de pago válida 

//metodo onChange()
function activarBotonCuentaGral(e)
{
    if(e.value=='SO')
    {
        $("#btnConfirmarPaga").prop("disabled", true);
    }
    else
    {
        $("#btnConfirmarPaga").prop("disabled", false);
    }
}

