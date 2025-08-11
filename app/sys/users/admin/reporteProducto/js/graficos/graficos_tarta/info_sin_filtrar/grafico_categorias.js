function graficoTartaCategoriasSinFiltrar()
{
    google.charts.load('current', {'packages':['corechart']});

    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Value');

        //descarga de datos desde la BD
        $.ajax({
            url: "funciones_php/graficos/info_sin_filtrar/read_ventas_por_categoria.php",
            type: "POST",
            success: function(e)
            {
                let json = JSON.parse(e);
                json.forEach(j=>{
                    data.addRows([[`${j.nombre_categoria}`, j.cantidad]]);
                })

                var options = {'title':'Ventas por categorías',
                width: graficoWidthTarta(),
                height: graficoHeightTarta(),
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
                var chart = new google.visualization.PieChart(document.getElementById("graficoTartaCategorias"));
                chart.draw(data, options);
            }
        });
    }
}