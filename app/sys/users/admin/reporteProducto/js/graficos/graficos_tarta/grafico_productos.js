function descargarInfoGraficoProductos()
{
    return $.ajax({
        url: "funciones_php/read_cant_productos_vendidos.php",
        type: "POST",
        async: false
    }).responseText;
}






function graficoProductos()
{
    google.charts.load('current', {'packages':['corechart']});

    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Value');

        //descarga de datos desde la BD
        let descarga = descargarInfoGraficoProductos();
        let json = JSON.parse(descarga);
        json.forEach(j=>{
                let cantidad = parseInt(j.cantidad);
                data.addRows([[`${j.nombre_producto}`, cantidad]]);
            })
            var options = {'title':'Ventas de productos',
                width: 400,
                height: 400,
                chartArea: {
                    'width': '50%'
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



