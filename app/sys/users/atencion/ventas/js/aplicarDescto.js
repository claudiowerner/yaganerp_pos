function aplicarDescto()
{
    debugger;
    let id_venta = parseInt($("#id_venta").text());
    let txtDescto = parseInt($("#txtPorcDescuento").val());

    let datos = 
    {
        "id_venta": id_venta,
        "descto": txtDescto
    };

    $.ajax(
        {
            url:"func_php/aplicarDescto.php",
            data: datos,
            type: "POST",
            success: function(e)
            {
                msjes_swal("Excelente", e, "success")
            }
        }
    )
    .fail(function(e)
    {
        msjes_swal("Error al cargar ID de la venta: ",e,"error");
    })
}