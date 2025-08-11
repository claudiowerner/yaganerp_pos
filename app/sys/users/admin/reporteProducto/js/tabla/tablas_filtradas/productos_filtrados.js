

function cargarTablaProductosFiltrados(fecha_inicio, fecha_fin)
{
    let datos = {
        "fecha_inicio": fecha_inicio,
        "fecha_fin": fecha_fin,
    };
    $.ajax({
        url: "funciones_php/graficos/info_filtrada/tablas/read_cant_productos_vendidos.php",
        data: datos,
        type: "POST",
        success: function(e)
        {
            let json = JSON.parse(e);
            let template = "";
            let valor_total = 0;
            json.forEach(j=>{
                let dinero_generado = formatearNumero("P",j.valor);
                template+=
                `<tr>
                    <td><strong>${j.nombre_producto}</strong></td>
                    <td>${j.cantidad}</td>
                    <td>${dinero_generado}</td>
                </tr>`;
                valor_total = parseInt(valor_total) + parseInt(j.valor);
            })
            let valor_total_formateado = formatearNumero("P", valor_total);
            template += 
            `<tr>
                <td colspan=2><strong>Valor total:</strong></td>
                <td><strong>${valor_total_formateado}</strong></td>
            </tr>`;
            $("#tbodyProductos").html(template);
        }
    })
    
}