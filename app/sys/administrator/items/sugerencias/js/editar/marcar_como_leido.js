function marcar_sugerencia_leida(id)
{
    $.ajax({
        url: "php/sugerencias/editar/marcar_como_leido.php",
        data: {"id": id},
        type: "POST", 
        success: function(e)
        {
            $("#tab_sugerencia").DataTable().ajax.reload();
        }
    })
}