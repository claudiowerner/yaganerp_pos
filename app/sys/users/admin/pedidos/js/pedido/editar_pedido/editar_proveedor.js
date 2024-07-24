

//editar proveedor del pedido

function editarProveedor()
{
    let id_pedido = $("#idPedido").text();
    let id_proveedor = $("#slctProveedor").val();
    let datos = {
        "id_pedido": id_pedido,
        "id_proveedor": id_proveedor
    }
    let response = $.ajax({
        url: "funciones/pedido/editar/editar_proveedor.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText;
}


function editarProveedorEditar()
{
    let id_pedido = $("#idModal").text();
    let id_proveedor = $("#slctProveedorEditar").val();
    let datos = {
        "id_pedido": id_pedido,
        "id_proveedor": id_proveedor
    }
    let response = $.ajax({
        url: "funciones/pedido/editar/editar_proveedor.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText;
}

