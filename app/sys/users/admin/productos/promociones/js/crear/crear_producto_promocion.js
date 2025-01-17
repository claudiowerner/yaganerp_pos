

function crearProductoPromocion()
{
    id = $("#slctProductoPromocion").val();
    id_promo  = $("#idPromocion").text();

    
    let datos = {
        "id_prod": id, 
        "id_promo": id_promo
    }

    $.ajax({
        url: "promociones/funciones/editar/editar_id_producto.php",
        data: datos,
        type: "POST",
        success: function(e)
        {
            $("#tablaPromociones").DataTable().ajax.reload();
        }
    })
    .fail(function(e){
        console.error("ERROR AL EDITAR EL PRODUCTO SELECCIONADO: "+e.responseText)
    });
}