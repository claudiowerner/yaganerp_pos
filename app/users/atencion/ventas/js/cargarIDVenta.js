idMesa = $("#nMesa").text();

$.ajax(
    {
        url:"func_php/cargarIDVenta.php",
        data: {"idMesa": idMesa},
        type: "POST",
        success: function(e)
        {
            $("#id_venta").html(e);
        }
    }
)