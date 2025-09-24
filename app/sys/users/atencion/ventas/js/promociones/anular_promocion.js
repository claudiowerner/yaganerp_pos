function anular_promo(id_detalle)
{
    let id_venta = $("#id_venta").text();
    let idProd = parseInt(obtener_id_prod_promocion(id_detalle));
    //cantidad de unidades que aplican a una promoción
    let j_p = JSON.parse(leerUnidadesPromo(idProd));

    //cantidad de un producto específico
    let j_v = JSON.parse(leerUnidadesVenta(idProd, id_venta));
    
    if(j_p!=null)
    {
        //leer datos
        //leer unidades de una promo
        let promo = j_p.unidades;
        //leer unidades en venta asociadas a una promo
        let venta = j_v.unidades;
        //leer ID de la promocion
        let id_promo = j_p.id;
        //leer precio de una promo
        let j_p_p = JSON.parse(obtenerPrecioPromo(id_promo));

        //dividir entre venta vs promo
        let division = venta/promo;

        let datos = {
            "id_detalle": id_detalle,
            "division": division,
            "unid_promo": promo,
            "id_venta": id_venta,
        };
        $.ajax({
            url:"func_php/promociones/anular_promocion.php",
            data: datos,
            type: "POST", 
            success: function(e)
            {
                //alert(e)
            }
        })
        .fail(function(e){
            alert(e.responseText)
        })
    }
    
}