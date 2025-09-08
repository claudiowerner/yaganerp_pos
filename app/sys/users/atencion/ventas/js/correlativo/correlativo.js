function correlativo()
{
    idCaja = $("#nCaja").text();
    nomCaja = $("#nomCaja").text();
    hora = getHora();
    $.ajax(
        {
            url: "../correlativo/correlativo.php?idCaja="+idCaja+"&nomCaja="+nomCaja+"&hora="+hora,
            type: "GET",
            success: function(e)
            {
                let j = JSON.parse(e);
                if(j.corr)
                {
                    let id = cargarIDVentaCaja(idCaja);
                    $("#id_venta").html(id);
                }
            }
        }
    )
    .fail(function(e)
    {
        msjes_swal("Error correlativo",e,"error");
    })
}