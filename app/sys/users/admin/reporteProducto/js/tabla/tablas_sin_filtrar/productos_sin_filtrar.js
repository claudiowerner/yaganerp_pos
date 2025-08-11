

function cargarTablaProductosSinFiltrar()
{
    $.ajax({
        url: "funciones_php/graficos/info_sin_filtrar/read_cant_productos_vendidos.php",
        type: "POST",
        success: function(e)
        {
            let template = "";
            let valor_total = 0;

            let json = JSON.parse(e);
            json.forEach(j=>{
                let dinero_generado = formatearNumero("P",j.valor);
                let valor_unitario = formatearNumero("P", j.valor_unitario);
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