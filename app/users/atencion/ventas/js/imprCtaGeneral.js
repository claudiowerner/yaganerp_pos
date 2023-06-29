propina = 0;
$(document).on('click', "#checkPropinaCuentaGeneral", function(e)
{
  if(e.target.checked)
  {
    propina = 1;
  }
  else
  {
    propina = 2;
  }
});

$("#imprCuentaGeneral").on("click",function(e)
{
  $("#imprCtaGral").modal("show");
});

//imprimir cuenta general
$("#btnImprCtaGral").on("click", function()
{
  valorNeto = $("#valorNeto").text();
  if(confirm("¿Desea imprimir la cuenta general?"))
  {
    //definicion de variables a enviar
    

    /*window.open ("cuentas/cta_general.php?propina1="+propina+
                    "&valorNeto="+valorNeto+
                    "&nMesa="+ nMesa+ 
                    "&idVenta="+ idVenta+
                    "&fecha="+ fecha+
                    "&hora="+ hora+
                    "&forma="+ formaPago+
                    "&neto="+ neto+
                    "&propina="+ propina+
                    "&folio="+ folio+
                    "&idCaja="+ idCaja, "_blank");*/


  }
})
