function imprimirResumenVenta(dir, idCierre)
{
    nomCaja = $("#nomCaja").text();
    id_cl = cargarIDUsuario(dir);

    datos = {
        "idCierre": idCierre,
        "nomCaja": nomCaja,
        "id_cl": id_cl
    }
    $.ajax(
        {
            url:"https://webposerp.cl/impresion_yaganerp/vendor/ticket_resumen_turno.php",
            data: datos,
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
}