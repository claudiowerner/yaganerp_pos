

function cargarTablaProductosSinFiltrar()
{
    let descarga = descargarInfoGraficoBarraProductosSinFiltrar()
    let json = JSON.parse(descarga);
    let template = "";
    console.log(json);
    json.forEach(j=>{
        let dinero_generado = formatearNumero("P",j.valor);
        template+=
        `<tr>
            <td><strong>${j.nombre_producto}</strong></td>
            <td>${j.cantidad}</td>
            <td>${dinero_generado}</td>
        </tr>`
    })

    $("#tbodyProductos").html(template);
}