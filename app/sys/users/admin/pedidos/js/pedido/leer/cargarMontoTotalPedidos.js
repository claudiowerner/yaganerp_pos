
function cargarMontoTotalPedidos()
{
  return $.ajax({
    url:"funciones/pedido/read/pedido/read_monto_pedido.php",
    type: "POST",
    async: false
    
  }).responseText;
}

function imprimirMontoTotalPedido()
{
  let descarga = cargarMontoTotalPedidos();
  let resultado = formatearNumero("P",descarga);
  $("#montoPedido").html(resultado);
}


imprimirMontoTotalPedido();