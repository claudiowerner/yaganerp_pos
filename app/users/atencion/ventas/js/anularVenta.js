$(".anularVenta").on("click", function(e)
{
  let corr = $("#id_venta").text();
  let nMesa = $("#mesaAnular").text();
  let hora = getHora();

  $.ajax(
    {
      url: "func_php/anular_venta_exe.php?corr="+corr+"&hora="+hora+"&nMesa="+nMesa,
      type: "GET",
      success: function(e)
      {
        swal({
          title:"Excelente",
          text:e,
          icon:"success"
        })
        correlativo();
        cargarIDVentaCaja();
        cargarVentasCaja();
      }
    }
  )
  .fail(function(e)
  {
    console.log(e.responseText);
  })
});


/*$("#btnAnularVenta").on("click", function(e)
{
  alert("Anular venta")
  

})*/
