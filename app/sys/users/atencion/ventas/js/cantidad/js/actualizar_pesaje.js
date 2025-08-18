$("#btnActCantidadPesaje").on("click", function(e)
{
  
  let id = $("#idVentaPesaje").text();
  let idProd = $("#id_prodPesaje").text();
  let cantidad = parseFloat($("#cantModPesaje").val());
  modificarCant(id, cantidad, idProd);
})