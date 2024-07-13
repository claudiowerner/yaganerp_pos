function descargarInfoGraficoCategorias()
{
    return $.ajax({
        url: "funciones_php/read_ventas_por_categoria.php",
        type: "POST",
        async: false
    }).responseText;
}





function graficoCategorias()
{
    google.charts.load('current', {'packages':['corechart']});

    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Value');

        //descarga de datos desde la BD
        let descarga = descargarInfoGraficoCategorias();
        let json = JSON.parse(descarga);
        json.forEach(j=>{
                let cantidad = parseInt(j.cantidad);
                data.addRows([[`${j.nombre_categoria}`, cantidad]]);
            })

        var options = {'title':'Ventas por categorías',
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
        var chart = new google.visualization.PieChart(document.getElementById("graficoCategorias"));
        chart.draw(data, options);
    }
}