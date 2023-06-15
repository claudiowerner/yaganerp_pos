$(document).on('click', '#checkPagarVentaInd', function(e)
{
  idVentaInd = $(this).attr("venta");

  if(e.target.checked)
  {
    arrayCuentaIndividual.push(idVentaInd);

  }
  else
  {
   arrayCuentaIndividual = arrayCuentaIndividual.filter(pr => pr != idVentaInd);
  }
  arrayCuentaIndividual.sort();
})


//imprimir cuenta individual
$("#imprCtaIndividual").on("click", function(e)
{
  $("#imprCtaInd").modal("show");
})

$("#btnImprimirCtaInd").on("click", function(e)
{
  if(confirm("¿Desea imprimir la cuenta individual?"))
  {
    nMesa = $("#nMesa").text();
    idVenta = $("#id_venta").text();
    fecha = getFechaBD();
    hora = getHora();
    formaPago = $("#metodoPagoInd").val();
    neto = $("#valorNeto").text();
    propina = $("#propinaCuentaGeneral").text();
    folio = $("#id_venta").text();
    idCaja = $("#id_caja").text();

    //apertura de nueva pestaña con el PDF
    window.open ("cuentas/cta_individual.php?propina1="+propina+
                    "&valorNeto=" +valorNeto +
                    "&nMesa=" + nMesa + 
                    "&idVenta=" + arrayCuentaIndividual +
                    "&fecha=" + fecha +
                    "&hora=" + hora +
                    "&forma=" + formaPago +
                    "&neto=" + neto +
                    "&propina=" + propina +
                    "&folio=" + folio +
                    "&idCaja=" + idCaja, "_blank");
    location.href = "../";
  }
})