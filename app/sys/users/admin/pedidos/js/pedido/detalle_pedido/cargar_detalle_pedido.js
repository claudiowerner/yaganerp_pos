//funcion que descarga los pedidos según el ID
function cargarDetallePedido(id_pedido)
{
    return $.ajax({
        url: "funciones/pedido/read/read_detalle_pedido.php",
        data: {"id_pedido": id_pedido},
        type: "POST",
        async: false
    }).responseText;
}


//funcion que parsea los resultados obtenidos
function imprimirDetallePedido(idPedido)
{
    let descarga = cargarDetallePedido(idPedido);
    let template = "";
    let item = 0;
    try
    {
        let json = JSON.parse(descarga);
        json.forEach(j=>{
            item++
            template+=
            `<tr><td>${item}</td>
            <td><input type=text id='producto${j.id}' class='form-control productoEditar' onkeyup='editarNombre(${j.id})' placeholder='Ingrese el nombre' value='${j.producto}'></td>
            <td><input type=number id='cantidad${j.id}' class='form-control cantidadEditar' onkeyup='editarCantidad(${j.id})' value='${j.cantidad}'></td>
            <td><input type=number id='valor${j.id}' class='form-control valorEditar' onkeyup='editarValor(${j.id})' value='${j.valor}'></td>
            <td><button id="btnEliminar" class="btn btn-danger" onClick='eliminarDetallePedido(${j.id},${item})'>-</button></td></tr>`;
        })
    }
    catch(e)
    {
        template= `<tr><td colspan=5>El pedido está vacío. ¡Comience a agregar detalles!</td></tr>`;
    }
    return template;
}


