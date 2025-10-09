$("#btnGuardarPromocion").on("click", function(e)
{
    let nombre_promo = $("#txtNombrePromocion").val();
    let id_prod = $("#slctProductoPromocion").val();
    let unidades = $("#txtNumeroUnidades").val();
    let precio_promo = $("#txtPrecioPromocion").val();

    if(nombre_promo==""||id_prod==0||unidades==""||precio_promo=="")
    {
        msjes_swal("Aviso", "Debe indicar opciones válidas.", "warning")
    }
    else
    {
        let datos = {
            "nombre_promo": nombre_promo,
            "id_prod": id_prod,
            "unidades": unidades,
            "precio_promo": precio_promo,
        };

        $.ajax({
            url: "promociones/funciones/crear/crear_promocion.php",
            data: datos,
            type: "POST",
            success: function(e)
            {
                let j = JSON.parse(e);
                msjes_swal(j.titulo, j.mensaje, j.icono);
                if(j.registro)
                {
                    $("#tablaPromociones").DataTable().ajax.reload();
                    $("#modalRegistrarPromocion").modal("hide"); 
                }
            }
        })
    }
})