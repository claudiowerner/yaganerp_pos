$.ajax(
        {
            url:"func_php/read_metodo_pago.php",
        type: "GET",
        success: function(e)
        {
            console.log("Método pago: "+e);
            template = "<option value='SO'>----------SELECCIONE----------</option>";
            metodos = JSON.parse(e);
            metodos.forEach(m=>{
                template = template+
                `<option value="${m.id}">${m.nombre_opcion}</option>`;
            })
            $("#metodoPagoGral").html(template);
            $("#metodoPagoInd").html(template);
        }
    }
)