$("#btnCierreDefinitivoCaja").on("click", function(e)
{
    $.ajax({
        url:"func_php/caja_atencion/cerrar_caja.php",
        data: {"idCaja": nCaja},
        type: "POST",
        success: function(e)
        {
            if(e==1)
            {
                msjes_swal("Excelente", "Caja cerrada correctamente", "success");
                location.href="../";
            }
            else
            {
                msjes_swal("Error", "Error al cerrar la caja", "error");
            }
        }
    })
    .fail(function(e)
    {
        swal({
            title: "Error",
            text: "Error al cerrar la caja: "+e.responseText,
            icon: "error"
        })
    })
})