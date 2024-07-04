$("#pedidos").on('click', '#btnImprimir', function(e)
{
    let id = $(this).data("id");

    $.ajax(
        {
            url:"https://webposerp.cl/impresion_yaganerp/vendor/ticket_pedido.php",
            data: {"id_pedido": id},
            type: "POST",
            success: function(e)
            {
                swal({
                    title: "Excelente",
                    text: e,
                    icon: "success"
                })
            }
        }
        )
        .fail(function(e)
        {
            swal({
                title: "Error",
                text: e.responseText,
                icon: "error"
            })
        })

});