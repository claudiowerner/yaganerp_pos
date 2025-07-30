let id_caja = $("#id_caja").text();
    
$.ajax({
    url: "php/leer/obtener_nombre_caja.php",
    data: {"id_caja": id_caja},
    type: "POST",
    success: function(e)
    {
        let j = JSON.parse(e);
        $("#span_caja").html(j.nom_caja)
    }
})