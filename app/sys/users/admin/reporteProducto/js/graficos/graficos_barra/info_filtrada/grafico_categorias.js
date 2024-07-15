function descargarInfoGraficoBarraCategorias(fecha_inicio, fecha_fin)
{
    let datos = {
        "fecha_inicio": fecha_inicio,
        "fecha_fin": fecha_fin,
    };
    return $.ajax({
        url: "funciones_php/graficos/info_filtrada/read_ventas_por_categoria.php",
        data: datos, 
        type: "POST",
        async: false
    }).responseText;
}





function graficoBarraCategorias(fecha_inicio, fecha_fin)
{
    google.charts.load('current', {'packages':['corechart']});

    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Value');

        //descarga de datos desde la BD
        let descarga = descargarInfoGraficoBarraCategorias(fecha_inicio, fecha_fin);
        let json = JSON.parse(descarga);
        json.forEach(j=>{
                let cantidad = parseInt(j.cantidad);
                data.addRows([[`${j.nombre_categoria}`, cantidad]]);
            })

        var options = {'title':'Ventas por categorías',
            width: graficoWidthBarra(),
            height: graficoHeightBarra(),
            chartArea: {
                'width': '100%'
            },
            bar: {
                groupWidth: "100%"
            },
            legend: {
                position: "none"
            },};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById("graficoBarraCategorias"));
        chart.draw(data, options);
    }
}