/* ARREGLAR IMPRESIÓN DE GRÁFICO DE PRODUCTOS */

function graficoBarraProductosSinFiltrar()
{
    google.charts.load('current', {'packages':['corechart']});

    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Value');

        $.ajax({
            url: "funciones_php/graficos/info_sin_filtrar/read_cant_productos_vendidos.php",
            type: "POST",
            success: function(e)
            {
                let json = JSON.parse(e);
                json.forEach(j=>{
                    data.addRows([[`${j.nombre_producto}`, j.cantidad]]);
                })

                var options = {'title':'Ventas de productos',
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
                var chart = new google.visualization.BarChart(document.getElementById("graficoBarraProductos"));
                chart.draw(data, options);
            }
        });
        
    }
}



