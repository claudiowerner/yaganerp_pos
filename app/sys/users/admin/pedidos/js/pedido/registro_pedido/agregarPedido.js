$("#btnAgregarPedido").on("click", function(e)
{

    let id_temp = $("#idTemporada").text();
    $.ajax({
        url:"funciones/pedido/crear/crear_pedido.php",
        data: {"id_temp": id_temp},
        type: "POST",
        success: function(e)
        {
            let j = JSON.parse(e);
            if(j.registro)
            {
                //rellenar select con proveedores
                imprimirProveedores()
                let idPedido;
                //obtener la fecha
                let fecha = getFecha()
                
                idPedido = parseInt(obtenerIDPedido());
                $("#idPedido").html(idPedido);

                let registrarPedido = agregarDetallePedido(idPedido, fecha);
                
                
                let pedidos = imprimirDetallePedido($("#idPedido").text());
                $("#bodyPedidos").html(pedidos);
                $("#modalRegistro").modal("show");

                crearPedido();
                leer_pedidos(id_temp);

            }
            else
            {
                msjes_swal("Error", "Error al intentar crear pedido.", "error");
            }
        }
    })
    
});