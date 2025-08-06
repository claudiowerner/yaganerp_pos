function leer_solicitudes()
{
    $.ajax({
        url: "script_php/leer/leer_solicitudes.php",
        type: "POST", 
        success: function(e)
        {
            $("#contenido").html(e);
        }
    })
}