/* ------------------------------------------ FUNCTION AJAX ----------------------------------------- */
function descargarInfoGraficoAnual()
{
    // Obtener una referencia al elemento canvas del DOM
    var fecha = new Date();
    var año = fecha.getFullYear();
    var añoSelect = $("#añoVenta").val();
    var url = "";
    if(añoSelect==null)
    {
        url = "graficos/php/read_ventas_mensuales.php?ano="+año;
    }
    else
    {
        url = "graficos/php/read_ventas_mensuales.php?ano="+añoSelect;
    }
    return $.ajax({
        url:url,
        type: "GET",
        async: false
    }).responseText;

}

/* ------------------------------------------ IMPRIMIR GRÁFICO --------------------------------------- */


function crearGrafico()
{
    let descargar = descargarInfoGraficoAnual();
    let json = JSON.parse(descargar);
    // Load the Visualization API and the corechart package.
    google.charts.load('current', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);

    // Callback that creates and populates a data table,
    // instantiates the pie chart, passes in the data and
    // draws it.
    function drawChart() {
        
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Value');
        
        json.forEach(j=>
            {
                let valor = parseInt(j.valor);
                data.addRows([[`${j.mes}`, valor]]);
            })

        // Set chart options
        var options = {'title':'Ventas por mes',
                    'width':1000,
                    'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById("ventasAño"));
        chart.draw(data, options);
    }

}