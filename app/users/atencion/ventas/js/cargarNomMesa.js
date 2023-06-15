let idMesa = $("#nMesa").text();
cargarNomMesa();
function cargarNomMesa()
{
    $.ajax(
        {
            url:"func_php/cargarNomMesa.php",
            data: {"idMesa":idMesa},
            type: "POST",
            success: function(e)
            {
                $("#nomMesa").html(e);
            }
        }
    )
}