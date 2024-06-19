$.ajax(
    {
        url:"func_php/metodo_pago/read_metodo_pago.php",
        type: "GET",
        success: function(e)
        {
            template = "<option value='SO'>----------SELECCIONE----------</option>";
            metodos = JSON.parse(e);
            metodos.forEach(m=>{
                template = template+
                `<option value="${m.id}">${m.nombre_opcion}</option>`;
            })
            $("#metodoPagoGral").html(template);
            $("#metodoPagoCuenta").html(template);
        }
    }
)