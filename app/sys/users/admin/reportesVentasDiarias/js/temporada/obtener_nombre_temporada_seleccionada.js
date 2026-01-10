function obtener_temporada_seleccionada(id_temp)
{
    $.ajax({
        url: "php/temporada/obtener_temporada_seleccionada.php",
        data: {"id_temp": id_temp},
        type: "POST", 
        success: function(e)
        {
            let j = JSON.parse(e);
            $("#idTemporada").html(j.id);
            $("#btnTemporada").html(j.nombre_temporada+" (click acá para cambiar)")
            $("#modalTemporadas").modal("hide");
            leer_cierres_caja(j.id)
        }
    })
}