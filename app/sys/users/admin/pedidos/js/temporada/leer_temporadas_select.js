$.ajax({
    url: "funciones/temporada/leer_temporadas.php",
    type: "POST",
    success: function(e)
    {
        let json = JSON.parse(e)
        let template = "";
        
        json.forEach(j=>{
            template += `<option value="${j.id}">${j.nombre}</option>`;
        })
        $("#slctTemporada").html(template);
        $("#slctTemporadaEditar").html(template);
    }
            
})