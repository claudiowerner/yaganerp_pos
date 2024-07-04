
//función que crea el pedido
function crearPedido()
{
    return $.ajax({
        url:"funciones/pedido/crear/crear_pedido.php",
        data: {"fecha": getFecha()},
        type: "POST",
        async: false
    }).responseText
}



//funcion que obtiene si hay un pedido que esté en edición
function pedidoEnEdicion()
{
    return $.ajax({
        url:"funciones/pedido/read/cargar_pedido_en_edicion.php",
        type: "POST",
        async: false
    }).responseText
}

//funcion que carga el ID de un pedido
function obtenerIDPedido()
{
    return $.ajax({
        url:"funciones/pedido/read/cargar_id_pedido_nuevo.php",
        type: "POST",
        async: false
    }).responseText
}

//funcion que devuelve si el pedido está vacío o no
function comprobarPedidoVacio(id)
{
    return $.ajax({
        url:"funciones/pedido/read/comprobar_pedido_vacio.php",
        data: {"id_pedido": id},
        type: "POST",
        async: false
    }).responseText
}

/*función que cierra la edición inicial del pedido 
(se cierra la edición del pedido al agregar el primer detalle)*/

function cerrarEdicionPedido(id_pedido)
{
    return $.ajax({
        url:"funciones/pedido/editar/editar_estado_edicion.php",
        data: {"id_pedido": id_pedido},
        type: "POST",
        async: false
    }).responseText
}

$("#btnAgregarPedido").on("click", function(e)
{
    debugger;
    //rellenar select con proveedores
    imprimirProveedores()
    let idPedido;
    //obtener la fecha
    let fecha = getFecha()
    /*se valida si existe un pedido en edición o no. Si no existen, retornará valor 0 y se creará un pedido*/
    let edicion = parseInt(pedidoEnEdicion());
    
    if(edicion!=0)
    {
        $("#idPedido").html(edicion);
    }
    else
    {
        crearPedido();
        idPedido = parseInt(obtenerIDPedido());
        $("#idPedido").html(idPedido);
    }

    /* Se valida si el pedido está vacío (obviamente lo está) y según eso se muestran los campos de texto 
    para poner el primer detalle */
    let detallePedido = parseInt(comprobarPedidoVacio(edicion));
    if(detallePedido==0)
    {
        let registrarPedido = agregarDetallePedido(idPedido, fecha)
        let jsonRes = JSON.parse(registrarPedido);
        if(jsonRes.registro)
        {
            //acá se cierra la edición del pedido para que cuando se quiera crear otro, no siga apareciendo el mismo anterior
            let cerrarEdicion = cerrarEdicionPedido(idPedido)
            jsonRes = JSON.parse(cerrarEdicion);
        }
    }
    
    let pedidos = imprimirDetallePedido($("#idPedido").text());
    $("#bodyPedidos").html(pedidos);
    $("#modalRegistro").modal("show");

});