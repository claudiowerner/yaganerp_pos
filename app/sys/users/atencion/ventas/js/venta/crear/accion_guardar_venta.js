function accionGuardarVenta(idCaja, id_venta, idProd, hora, cantProd, nomCaja)
{
    $.ajax({
        url: "func_php/venta/crear_venta_exe.php?idCaja="+idCaja+"&id_venta="+id_venta+"&idProd="+idProd+"&cantProd="+cantProd+"&nomCaja="+nomCaja+"&hora="+hora,
        type: "GET",
        success: function(r)
        {
            let promo = promocionActiva();
            let j = JSON.parse(promo);
            if(j.activado)
            {
                aplicarPromo(idProd, id_venta);
            }
            cargarVentasCaja();
        }
    })
    .fail( function(e) 
    {
        console.log( 'Error productos!!'+e.responseText );
    });

    $("#cantProd").html("1");
    
}