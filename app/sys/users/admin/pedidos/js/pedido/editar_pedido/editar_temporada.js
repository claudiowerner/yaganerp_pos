function editar_temporada()
{
    let temporada = $("#slctTemporada").val();
    let pedido = $("#id_pedido").text();
    alert("Temporada: "+temporada + " pedido: " + pedido)
    
    let datos = {
        "temp": temporada, 
        "pedido": pedido
    }
    $.ajax({
        url: "funciones/temporada/editar_temporada.php",
        data: datos,
        type: "POST",
        success: function(e)
        {
            if(e.match(/1/))
            {
                toastr.success("¡Guardado!")
            }
            if(e.match(/0/))
            {
                toastr.error("Error al guardar");
            }
        }
    })
    .fail(function(e){
        alert(e)
    })
}