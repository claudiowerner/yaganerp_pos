

function graficoBarraCategoriasSinFiltrar()
{
    google.charts.load('current', {'packages':['corechart']});

    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Value');

        $.ajax({
            url: "funciones_php/graficos/info_sin_filtrar/read_ventas_por_categoria.php",
            type: "POST",
            success: function(e)
            {
                let json = JSON.parse(e);
                console.log(json)
                json.forEach(j=>{
                    data.addRows([[`${j.nombre_categoria}`, j.cantidad]]);
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
                        position: "top"
                    },};

                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.BarChart(document.getElementById("graficoBarraCategorias"));
                chart.draw(data, options);
            }
        });
        
        
    }
}