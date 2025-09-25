
function aplicarPromo(idProd, id_venta)
{
    //trozo de código AJAX que verifica si existe una promoción para el producto seleccionado
    $.ajax({
        url: "func_php/promociones/comprobar_promocion_producto.php",
        data: {"idProd": idProd},
        type: "POST",
        success: function(e)
        {
            let j = JSON.parse(e);
            if(j.promo_activa)
            {
                //cantidad de unidades que aplican a una promoción
                let j_p = JSON.parse(leerUnidadesPromo(idProd));

                //cantidad de un producto específico
                let j_v = JSON.parse(leerUnidadesVenta(idProd, id_venta));

                //leer datos
                //leer unidades de una promo
                let promo = j_p.unidades;
                //leer unidades en venta asociadas a una promo
                let venta = j_v.unidades;
                //leer ID de la promocion
                let id_promo = j_p.id;
                //leer precio de una promo
                let j_p_p = JSON.parse(obtenerPrecioPromo(id_promo));

                //comprobar si la división da como resultado un número entero
                if(venta % promo === 0)
                {
                    //si es un número entero se cumple lo instruido en esta porción de código
                    precio_promo = j_p_p.precio;
                    promo_aplicada = Math.round(precio_promo/promo);
                    aplicarPromoAjax(idProd, id_venta, promo_aplicada)
                    cargarVentasCaja();
                }
            }
        }
    })
                
}


function aplicarPromoAjax(idProd, id_venta, promo_aplicada)
{
    let datos = {
        "id_prod": idProd,     
        "id_venta": id_venta, 
        "valor": promo_aplicada, 
    };

    $.ajax({
        url: "func_php/promociones/aplicar_promocion.php",
        data: datos,
        type: "POST",
        cache : false,
    })
    .fail(function(e){
        alert(e.responseText)
    });
}