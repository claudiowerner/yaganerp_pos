function cargarPromocionSeleccionada(id)
{
    $.ajax({
        url: "promociones/funciones/leer/leer_promocion_seleccionada.php",
        data: {"id_promo": id},
        type: "POST", 
        success: function(e)
        {
            let j = JSON.parse(e);
            $("#id_prod").html(j.id_prod);
            $("#idPromocionEditar").html(id);
            cargarProductosPromocion();
            $("#modalEditarPromocion").modal("show");
            $("#txtNombrePromocionEditar").val(j.nombre_promocion);
            $("#txtNumeroUnidadesEditar").val(j.unidades);
            $("#txtPrecioPromocionEditar").val(j.precio);
            
        }
    })
}
