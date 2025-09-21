function descontar_productos(id_venta)
{
    alert(id_venta)
    $.ajax({
        url: "func_php/pagos/descontar_productos.php",
        data: {"id_venta": id_venta},
        type: "POST",
        success: function(e)
        {
            alert(e)
        }
    })
    .fail(function(e){
        alert(e.responseText)
    })
}