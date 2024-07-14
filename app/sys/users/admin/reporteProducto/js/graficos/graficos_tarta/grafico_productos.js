function descargarInfoGraficoTartaProductos()
{
    return $.ajax({
        url: "funciones_php/read_cant_productos_vendidos.php",
        type: "POST",
        async: false
    }).responseText;
}






function graficoTartaProductos()
{
    google.charts.load('current', {'packages':['corechart']});

    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Value');

        //descarga de datos desde la BD
        let descarga = descargarInfoGraficoTartaProductos();
        let json = JSON.parse(descarga);
        json.forEach(j=>{
                let cantidad = parseInt(j.cantidad);
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
        var chart = new google.visualization.PieChart(document.getElementById("graficoProductos"));
        chart.draw(data, options);
    }
}



