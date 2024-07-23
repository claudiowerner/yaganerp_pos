/* ------------------------------------------------ FUNCTION AJAX ------------------------------------ */

function descargarDatosVentasHora(fecha)
{
    return $.ajax({
        url:"graficos/php/read_ganancia_horas.php?fecha="+fecha,
        type: "GET",
        async: false
    }).responseText;
}




/* ------------------------------------------------- FUNCTION DOM ------------------------------------- */
function crearGraficoVentaHora()
{
    let fecha = "";
    if($("#ventasPorDia").val()==null)
    {
        let hoy = new Date();
        let año = hoy.getFullYear();
        let mes = parseInt(hoy.getMonth()) + parseInt(1);
        let dia = hoy.getDate();
        if(mes<10)
        {
            mes = "0" + mes;
        }
        if(dia<10)
        {
            dia = "0" + dia;
        }
        
        fecha = año+"-"+mes+"-"+dia;
    }
    else
    {
        fecha = $("#ventasPorDia").val();
    }
    
    var descarga = descargarDatosVentasHora(fecha);
    let hora = JSON.parse(descarga);
            
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
            
        hora.forEach(j=>
            {
                let valor = parseInt(j.valor);
                data.addRows([[`${j.hora}:00`, valor]]);
            }
        )

        // Set chart options
        var options = {'title':'Ventas por hora',
                        'width':1000,
                        'height':300};
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById("gananciaHora"));
        chart.draw(data, options);
    }
}