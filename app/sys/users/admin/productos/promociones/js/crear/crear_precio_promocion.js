function crearPrecio()
{
    precio = $("#txtPrecioPromocion").val();
    id_promo  = $("#idPromocion").text();

    let datos = {
        "precio": precio, 
        "id_promo": id_promo
    }

    $.ajax({
        url: "promociones/funciones/editar/editar_precio_promocion.php",
        data: datos,
        type: "POST",
        success: function(e)
        {
            $("#tablaPromociones").DataTable().ajax.reload();
        }
    })
    .fail(function(e){
        console.error("ERROR AL EDITAR PRECIO DE PROMOCION: "+e.responseText)
    });
}