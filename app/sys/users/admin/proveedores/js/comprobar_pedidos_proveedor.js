function comprobarPedidosProveedor(id)
{
  return $.ajax({
    url: "func_php/comprobar_pedidos_proveedor.php",
    data: {"id": id},
    type: "POST",
    async: false
  }).responseText;
}