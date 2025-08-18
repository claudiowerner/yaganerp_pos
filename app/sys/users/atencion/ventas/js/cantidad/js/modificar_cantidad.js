$("#sumarCantMod").on('click', function(e)
{
  let numProd = $("#cantProdMod").text();
  pAgregado=parseFloat(numProd)+parseFloat(1);
  $("#cantProdMod").html(pAgregado);
});

$("#restarCantMod").on('click', function(e)
{
  let numProd = $("#cantProdMod").text();
  pAgregado=parseFloat(numProd)-parseFloat(1);
  if(pAgregado==0)
  {
    pAgregado = 1;
  }
  $("#cantProdMod").html(pAgregado);
});
