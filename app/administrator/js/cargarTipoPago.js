$.ajax(
    {
        url:"php/cliente/cargarTipoPago.php",
        type: "POST",
        success: function(e)
        {
            template = "";
            json = JSON.parse(e)
            json.forEach(j=>
                {
                    template = template+
                    `<option value='${j.id}'>${j.nombre}</option>`
                });
            $("#tipoPago").html(template);
            $("#tipoPagoEditar").html(template);
        }
    }
)