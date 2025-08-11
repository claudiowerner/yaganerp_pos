function cargarTablaCategoriasFiltradas(fecha_inicio, fecha_fin)
{
    let datos = {
        "fecha_inicio": fecha_inicio,
        "fecha_fin": fecha_fin,
    };
    $.ajax({
        url: "funciones_php/graficos/info_filtrada/tablas/read_ventas_por_categoria.php",
        data: datos, 
        type: "POST",
        success: function(e)
        {
            let json = JSON.parse(e)
            let total_ventas = 0;
            let template = "";
            json.forEach(j=>{
                template += `<tr><td>${j.nombre_categoria}</td><td>${j.cantidad}</td></tr>`;
                total_ventas = parseInt(total_ventas) + parseInt(j.cantidad)
            })
            template += `<tr><td><strong>Total de ventas</strong></td><td><strong>${total_ventas}</strong></td></tr>`;
            $("#tbodyCategorias").html(template)
        }
    })
    
}