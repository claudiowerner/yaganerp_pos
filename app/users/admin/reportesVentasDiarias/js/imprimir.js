function imprimirResumenVenta(dir)
{
    nCaja = $("#nCaja").text();
    nomCaja = $("#nomCaja").text();
    id_cl = cargarIDUsuario(dir);

    datos = {
        "idCierre": nCaja,
        "nomCaja": nomCaja,
        "id_cl": id_cl
    }
    $.ajax(
        {
            url:"https://192.168.1.20/impresion_yaganerp/vendor/ticket_resumen_turno.php",
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