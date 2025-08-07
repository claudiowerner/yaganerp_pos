$("#btnAbrirCaja").on('click', function(e)
{
  let nomCaja = $("#nombreCaja").val();
  
  if(nomCaja=="")
  {
    $("#msjCaja").html("<span style='color: red'>Debe rellenar el campo</span>");
  }
  else
  {
    $.ajax({
      url:"php/crear/abrir_caja.php?nomCaja="+nomCaja,
      type: "POST",
      data: {"nomCaja": nomCaja},
      success: function(e)
      {
        msjes_swal("Excelente", e, "success");
        obtenerCierresCaja();
        $("#abrirCaja").modal("hide");
        $("#msjCaja").html("<span style='color: red'></span>");
      }
    })
  }
})