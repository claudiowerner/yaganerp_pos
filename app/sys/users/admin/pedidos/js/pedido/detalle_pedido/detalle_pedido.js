
function agregarDetallePedido(id_pedido, fecha_reg)
{
    let datos = {
       "id_pedido" : id_pedido,
       "fecha_reg" : fecha_reg,    
    }
    return $.ajax({
        url: "funciones/pedido/crear/crear_detalle_pedido.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText;
}


