/* DEPENDIENDO DEL ESTADO DE ACTIVACIÓN DE LAS PROMOCIONES, SE HARÁ QUE SE MUESTRE EL DIV CON LAS PROMOCIONES REGISTRADAS, 
EN CASO CONTRARIO, SE MOSTRARÁ UN DIV QUE TIENE UN AVISO DE QUE SE ENCUENTRAN BLOQUEADAS LAS PROMOCIONES */


/* ------------------------------------------------ FUNCION AJAX --------------------------------------------------- */
$(document).on("ready", function(e)
{
    $.ajax({
        url: "promociones/funciones/leer/leer_estado_promocion.php",
        type: "POST", 
        success: function(e)
        {
            let j = JSON.parse(e);
            if(j.estado)
            {
                $("#promo_activada").show();
                $("#promo_desactivada").hide();
            }
            else
            {
                $("#promo_activada").hide();
                $("#promo_desactivada").show();
            }
        }
    })
    .fail(function(e){
        alert(e.responseText)
    })
})
