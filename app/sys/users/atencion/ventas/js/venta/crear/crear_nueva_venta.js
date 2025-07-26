$("#btnCrearVenta").on("click", function(e)
{
    let idCaja = $("#nCaja").text();
    $.ajax({
        url: "../correlativo/correlativo.php",
        data: {"idCaja": idCaja},
        type: "GET",
        success: function(e)
        {
            try
            {
                let j = JSON.parse(e);
                if(!j.corr)
                {
                    msjes_swal(j.titulo, j.mensaje, j.icono);
                }
            }
            catch(e)
            {
                msjes_swal("Error", "Error al crear nueva venta", "error");
            }
            cargarCorrelativo();
            cargarVentasCaja();
        }
    })
    .fail(function(e)
    {
        alert(e.responseText)
    })
})