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
                if(e==1)
                {
                    cargarIDVentaCaja();
                }
            }
        }
    )
}