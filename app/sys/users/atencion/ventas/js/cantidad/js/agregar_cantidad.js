let pAgregado = $("#numProd").val();

$("#sumarCant").on('click', function(e)
{
  let cantProd = $("#cantProd").text();
  cantProd = parseInt(cantProd)+parseInt(1);
  $("#cantProd").html(cantProd);
});

$("#restarCant").on('click', function(e)
{
  let cantProd = $("#cantProd").text();
  cantProd = parseInt(cantProd)-parseInt(1);
  if(cantProd==0)
  {
    cantProd = 1;
  }
  $("#cantProd").html(cantProd);
});
