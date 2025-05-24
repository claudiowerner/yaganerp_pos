function descontar_productos(id_venta)
{
    $.ajax({
        url: "php/pagos/descontar_productos.php",
        data: {"id_venta": id_venta},
        type: "POST",
        success: function(e)
        {
            
        }
    })
}