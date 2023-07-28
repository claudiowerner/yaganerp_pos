$("#btnCerrarCaja").on("click", function(e)
{
    let nCaja = $("#nCaja").text(); 
    let fecha = getFechaNormal();
    let idCierre = $("#id_caja").text();
    let nomCaja = $("#nomCaja").text();

    datos = {
        "nCaja": nCaja,
        "fecha": fecha,
        "idCierre": idCierre,
        "nomCaja": nomCaja
      }
    swal({
        title: "¿Está seguro?",
        text: "¿Desea cerrar esta caja?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((cerrar) => {
        if (cerrar)
        {
            $.ajax({
                url:"func_php/cerrar_caja.php",
                data: {"idCaja": nCaja},
                type: "POST",
                success: function(e)
                {
                    if(e==1)
                    {
                        msjes_swal("Excelente", "Caja cerrada correctamente", "success");

                        //imprimir ticket
                        $.ajax(
                            {
                                url: "https://webposerp.cl/impresion_yaganerp/vendor/ticket_resumen_caja.php",
                                data: datos,
                                type: "POST",
                                success: function(e)
                                {
                                    msjes_swal("Excelente", e, "success");
                                    location.href = "../";
                                }
                            }
                            )
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
        } 
        else 
        {
          swal("La caja seguirá abierta");
        }
      });
})