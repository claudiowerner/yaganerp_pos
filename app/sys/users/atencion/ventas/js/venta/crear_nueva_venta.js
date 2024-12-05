$("#btnCrearVenta").on("click", function(e)
{
    let idCaja = $("#nCaja").text();
    $.ajax({
        url: "../correlativo/correlativo.php",
        data: {"idCaja": idCaja},
        type: "GET",
        success: function(e)
        {
            cargarCorrelativo();
            cargarVentasCaja();
        }
    })
    .fail(function(e){
        alert(e.responseText)
    })
})