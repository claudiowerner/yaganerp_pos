
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
    //rellenar select con proveedores
    imprimirProveedores()
    let idPedido;
    //obtener la fecha
    let fecha = getFecha()
    
    
    crearPedido();
    idPedido = parseInt(obtenerIDPedido());
    $("#idPedido").html(idPedido);

    let registrarPedido = agregarDetallePedido(idPedido, fecha)
    
    let pedidos = imprimirDetallePedido($("#idPedido").text());
    $("#bodyPedidos").html(pedidos);
    $("#modalRegistro").modal("show");

});