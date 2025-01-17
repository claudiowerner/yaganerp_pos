function cargarPromocionSeleccionada(id)
{
    $.ajax({
        url: "promociones/funciones/leer/leer_promocion_seleccionada.php",
        data: {"id_promo": id},
        type: "POST", 
        success: function(e)
        {
            cargarProductosPromocion();
            let j = JSON.parse(e);

            $("#idPromocionEditar").html(id);
            $("#modalEditarPromocion").modal("show");
            $("#txtNombrePromocionEditar").val(j.nombre_promocion);
            $("#slctProductoPromocionEditar").select(j.id_prod);
            $("#txtNumeroUnidadesEditar").val(j.unidades);
            $("#txtPrecioPromocionEditar").val(j.precio);
            
        }
    })
}
