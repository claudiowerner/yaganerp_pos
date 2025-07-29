$("#cierreCaja").on('click', 'button.btn-success', function(e)
{
  let element = $(this)[0].parentElement.parentElement;
  let idCierre = $(element).attr('idCierre');
  let nomCaja = $(element).attr('nomCaja');
  location.href = "desglose/index.php?idCierre="+idCierre+"&nomCaja="+nomCaja;
})