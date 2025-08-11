


function graficoTartaProductos(fecha_inicio, fecha_fin)
{
    google.charts.load('current', {'packages':['corechart']});

    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Value');

        let datos = {
            "fecha_inicio": fecha_inicio,
            "fecha_fin": fecha_fin,
        };
        $.ajax({
            url: "funciones_php/graficos/info_filtrada/graficos/read_cant_productos_vendidos.php",
            data: datos,
            type: "POST",
            success: function(e)
            {
                let json = JSON.parse(e);
                let cantidad;
                json.forEach(j=>{
                    cantidad = parseInt(j.cantidad);
                    data.addRows([[`${j.nombre_producto}`, cantidad]]);
                })
                var options = {'title':'Ventas de productos',
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
                var chart = new google.visualization.PieChart(document.getElementById("graficoTartaProductos"));
                chart.draw(data, options);
            }
        })
        
            
    }
}



