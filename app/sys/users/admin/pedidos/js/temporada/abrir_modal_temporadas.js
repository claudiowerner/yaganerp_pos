$("#btnTemporada").click(function(e)
{
    $("#modalTemporadas").modal("show");

    //cargar contenido temporadas
    $.ajax({
        url: "funciones/temporada/leer_temporadas.php",
        type: "POST",
        success: function(e)
        {
            let json = JSON.parse(e);
            let template = "";
            let estado = ""
            let clase = ""
            json.forEach(j => {
                estado = j.estado;
                if(estado == 'S')
                {
                    clase = "btn btn-warning"
                }
                if(estado == "C")
                {
                    clase = "btn btn-primary";
                }
                template += `<button class="${clase}" onclick="obtener_temporada_seleccionada(${j.id})">${j.nombre}</button>`;
            });
            $("#temporadasCreadas").html(template);
        }
    })
    .fail(function(e){
        msjes_swal("Error", e.responseText, "error");
    })
})