function crearNombre()
{
    nombre = $("#txtNombrePromocion").val();
    id_promo  = $("#idPromocion").text();
    
    let datos = {
        "nombre": nombre, 
        "id_promo": id_promo
    }

    $.ajax({
        url: "promociones/funciones/editar/editar_nombre_promocion.php",
        data: datos,
        type: "POST",
        success: function(e)
        {
            $("#tablaPromociones").DataTable().ajax.reload();
        }
    })
    .fail(function(e){
        console.error("ERROR AL EDITAR NOMBRE DE PROMOCION: "+e.responseText)
    });
}