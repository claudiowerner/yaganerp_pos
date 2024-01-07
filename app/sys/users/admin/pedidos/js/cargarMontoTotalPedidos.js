cargarMontoTotalPedidos();
function cargarMontoTotalPedidos()
{
  $.ajax({
    url:"funciones/read_monto_pedido.php",
    type: "POST",
    success: function(e)
    {
      $("#montoPedido").html("$"+e)
    }
  })
}
