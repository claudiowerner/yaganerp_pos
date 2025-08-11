


function graficoBarraCategorias(fecha_inicio, fecha_fin)
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
            url: "funciones_php/graficos/info_filtrada/graficos/read_ventas_por_categoria.php",
            data: datos, 
            type: "POST",
            success: function(e)
            {
                let json = JSON.parse(e);
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

                try
                {
                    // Instantiate and draw our chart, passing in some options.
                    var chart = new google.visualization.BarChart(document.getElementById("graficoBarraCategorias"));
                    chart.draw(data, options);
                }
                catch(e)
                {
                    alert(e.responseText)
                }
            }
        })
        

        

        
    }
}