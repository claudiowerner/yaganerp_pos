cargarMontoTotalPedidos();
function cargarMontoTotalPedidos()
{
  $.ajax({
    url:"funciones/read_monto_pedido.php",
    type: "POST",
    success: function(e)
    {
      let resultado = formatearNumero("P",e);
      $("#montoPedido").html(resultado);
    }
  })
}
