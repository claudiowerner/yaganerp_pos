function btnDetalle(e)
{
  let id = $(e).attr('idCaja');
  let nom_caja = $(e).attr('nomCaja');
  location.href = "desglose_caja/index.php?id="+id+"&nomCaja="+nom_caja+"&idCierre="+idCierre;
}
  