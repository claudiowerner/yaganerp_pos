//valida si se ha seleccionado una opción de pago válida 

//metodo onChange()
function activarBotonCuentaGral(e)
{
    if(e.value=='SO')
    {
        $("#btnPagoCtaGral").prop("disabled", true);
        $("#btnImprCtaGral").prop("disabled", true);
    }
    else
    {
        $("#btnPagoCtaGral").prop("disabled", false);
        $("#btnImprCtaGral").prop("disabled", false);
    }
}


//activar botones y sumar valores y propina para pagar
function activarBotonCuentaInd(e)
{
    select = $("#metodoPagoInd").val();
    
    checkboxes = document.getElementsByName("checkPagarVentaInd");
    valor = document.getElementsByName("valorInd");
    propina = document.getElementsByName("propinaInd");
    checkeados = 0;

    valorTotal = 0;
    propinaTotal = 0;
    total = 0;

    for(i = 0; i<checkboxes.length; i++)
    {
        if(checkboxes[i].checked)
        {
            valorTotal = parseInt(valorTotal) + parseInt(valor[i].innerText);
            propinaTotal = parseInt(propinaTotal) + parseInt(propina[i].innerText);
            checkeados++;
        }
    }
    total = parseInt(valorTotal) + parseInt(propinaTotal);
    $("#valorIndividual").html(valorTotal);
    $("#propinaIndividual").html(propinaTotal);
    $("#totalIndividual").html(total);
    if(checkeados>0&&select!="SO")
    {
        $("#btnImprimirCtaInd").prop('disabled', false);
        $("#btnPagoInd").prop('disabled', false);
    }
    else
    {
        $("#btnImprimirCtaInd").prop('disabled', true);
        $("#btnPagoInd").prop('disabled', true);
    }
}