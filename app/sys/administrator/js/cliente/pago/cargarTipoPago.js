$.ajax(
    {
        url: "php/cliente/cargarTipoPago.php",
        type: "POST",
        success: function(e)
        {
            template = "<option value=0>SELECCIONE UNA OPCIÓN</option>";
            json = JSON.parse(e)
            json.forEach(j=>
                {
                    template = template+
                    `<option value='${j.id}'>${j.nombre}</option>`
                });
            $("#tipoPago").html(template);
            $("#tipoPagoEditar").html(template);
            $("#slctMetodoPago").html(template);
        }
    }
)