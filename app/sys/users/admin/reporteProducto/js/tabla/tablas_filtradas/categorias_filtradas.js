function cargarTablaCategoriasFiltradas(fecha_inicio, fecha_fin)
{
    let descarga = descargarInfoGraficoBarraCategorias(fecha_inicio, fecha_fin)
    let json = JSON.parse(descarga)
    let total_ventas = 0;
    let template = "";
    json.forEach(j=>{
        template += `<tr><td>${j.nombre_categoria}</td><td>${j.cantidad}</td></tr>`;
        total_ventas = parseInt(total_ventas) + parseInt(j.cantidad)
    })
    template += `<tr><td><strong>Total de ventas</strong></td><td><strong>${total_ventas}</strong></td></tr>`;
    $("#tbodyCategorias").html(template)
}