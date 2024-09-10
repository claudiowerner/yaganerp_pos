
$(document).on('click', '.btn-primary', function()
{
  id = $(this).attr('nroCaja');
  nomCaja = $(this).attr("nomCaja");

  //CREAR CORRELATIVO
  let hora = getHora();
  $.ajax({
    url: "correlativo/correlativo.php?nomCaja="+nomCaja+"&idCaja="+id+"&hora="+hora,
    type: "GET",
    success: function(r)
    {
      location.href = "ventas/index.php?id="+id+"&nomCaja="+nomCaja;
    }
  })
  .done(function(){
    console.log("Done correlativo");
  })
  .fail(function(r)
  {
    console.log("fail correlativo: "+r.responseText)
  })
});


$(document).on('click', '.btn-danger', function()
{
  id = $(this).attr('nroCaja');
  nomCaja = $(this).attr("nomCaja");
  location.href = "ventas/index.php?id="+id+"&nomCaja="+nomCaja;
});
