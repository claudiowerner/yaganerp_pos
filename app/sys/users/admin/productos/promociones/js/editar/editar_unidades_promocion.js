function editarUnidades()
{
    unidades = $("#txtNumeroUnidadesEditar").val();
    id_promo  = $("#idPromocionEditar").text();
    
    let datos = {
        "unidades": unidades, 
        "id_promo": id_promo
    }

    $.ajax({
        url: "promociones/funciones/editar/editar_unidades.php",
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