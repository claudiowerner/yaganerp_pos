function cargarTablaCategoriasSinFiltrar()
{
    $.ajax({
        url: "funciones_php/graficos/info_sin_filtrar/read_ventas_por_categoria.php",
        type: "POST", 
        success: function(e)
        {
            let total_ventas = 0;
            let template = "";
            let json = JSON.parse(e);
            json.forEach(j=>{
                template += `<tr><td>${j.nombre_categoria}</td><td>${j.cantidad}</td></tr>`;
                total_ventas = parseInt(total_ventas) + parseInt(j.cantidad)
            })
            template += `<tr><td><strong>Total de ventas</strong></td><td><strong>${total_ventas}</strong></td></tr>`;
            $("#tbodyCategorias").html(template)
        }
    })
    
}