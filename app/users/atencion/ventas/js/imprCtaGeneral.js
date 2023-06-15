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
    nMesa = $("#nMesa").text();
    idVenta = $("#id_venta").text();
    fecha = getFechaBD();
    hora = getHora();
    formaPago = $("#metodoPagoGral").val();
    neto = $("#valorNeto").text();
    propina = $("#propinaCuentaGeneral").text();
    folio = $("#id_venta").text();
    idCaja = $("#id_caja").text();

    let piso = $("#piso").text();
    let ubicacion = $("#ubicacion").text();

    window.open ("cuentas/cta_general.php?propina1="+propina+
                    "&valorNeto="+valorNeto+
                    "&nMesa="+ nMesa+ 
                    "&idVenta="+ idVenta+
                    "&fecha="+ fecha+
                    "&hora="+ hora+
                    "&forma="+ formaPago+
                    "&neto="+ neto+
                    "&propina="+ propina+
                    "&folio="+ folio+
                    "&idCaja="+ idCaja, "_blank");


  }
})
