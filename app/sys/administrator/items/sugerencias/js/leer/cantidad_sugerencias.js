//Ésta función se encarga de imprimir la cantidad de sugerencias leídas y el total existente.
cantidad_sugerencias();
function cantidad_sugerencias()
{
    $.ajax({
        url: "php/sugerencias/leer/cantidad_sugerencias.php",
        type: "POST",
        success: function(e)
        {
            let j = JSON.parse(e);
            $("#cantSugerencias").html(`(${j.sug_sin_leer}/${j.sugs_totales})`)
        }
    })
}