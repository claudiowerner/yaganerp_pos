nMesa = $("#nMesa").text();

$.ajax
(
    {
        url:"func_php/cargarNroPisoUbicacion.php",
        data: {"nMesa":nMesa},
        type: "POST",
        success: function(e)
        {
            template = "";
            nombres = JSON.parse(e);
            nombres.forEach(n=>
            {
                $("#piso").html(n.nom_piso);
                $("#ubicacion").html(n.nom_ubic);
            })
        }
    }
)
.fail(function(e)
{
    console.log("Error: " + e.responseText);
})