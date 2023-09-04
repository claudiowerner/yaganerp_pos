$.ajax(
    {
        url:"func_php/cargarNombreIdCaja.php",
        type: "POST",
        success: function(e)
        {
            json = JSON.parse(e)
            json.forEach(j=>
                {
                    $("#nombreCaja").html(j.nombre);
                    $("#id_caja").html(j.id);
                })
        }
    }
)