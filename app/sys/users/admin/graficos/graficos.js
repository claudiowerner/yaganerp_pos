// Obtener una referencia al elemento canvas del DOM
var grafica = document.querySelector("#gananciaHora");

//DECLARACION DE VARIABLES DE MESES
let e;
let f;
let mar;
let a;
let may;
let jn;
let jl;
let ag;
let s;
let o;
let n;
let d;

// Las etiquetas son las que van en el eje X. 
var etiqueta = [];

//obtenerFecha
let fecha = getFecha();
cargarFechas();
crearGrafico();
crearGraficoVentaHora(fecha);
selectAño();

function cargarFechas()
{
    $.ajax(
        {
            url: "graficos/read_ganancias_fecha.php",
            type: "POST",
            success: function(e)
            {
                json = JSON.parse(e)
                template = "";
                f = "";
                json.forEach(fecha=>
                    {
                        f = fecha.fecha;
                        template = template + 
                        `<option value="${fecha.fecha_formato_sql}">${fecha.fecha}</option>`;
                    }
                );
                $("#ventasPorDia").html(template);
                $("#ventasPorDia option[value='"+f+"']").attr("selected",true);
            }
        }
    )
}

function cambioFecha()
{
    let fecha = $("#ventasPorDia").val();

    crearGraficoVentaHora(fecha); 
    
}

function descargarInfoGraficoAnual()
{
    // Obtener una referencia al elemento canvas del DOM
    var fecha = new Date();
    var año = fecha.getFullYear();
    var añoSelect = $("#añoVenta").val();
    var url = "";
    if(añoSelect==null)
    {
        url = "graficos/read_ventas_mensuales.php?ano="+año;
    }
    else
    {
        url = "graficos/read_ventas_mensuales.php?ano="+añoSelect;
    }
    return $.ajax({
        url:url,
        type: "GET",
        async: false
    }).responseText;

}

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

function crearGraficoVentaHora()
{
    var descarga = descargarDatosVentasHora();
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

function descargarDatosVentasHora()
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
    return $.ajax({
        url:"graficos/read_ganancia_horas.php?fecha="+fecha,
        type: "GET",
        async: false
    }).responseText;
}

function selectAño()
{
    $.ajax({
        url:"graficos/read_ano_venta.php",
        type: "GET",
        success: function(resp)
        {
            let template = '';
            let año = JSON.parse(resp);
            año.forEach(a=>{
                template += `<option value='${a.ano}'>${a.ano}</option>`;
            });
            $("#añoVenta").html(template);
        }
    })
    .fail(function(e)
    {
        console.log("Error select Año: "+e);
    })
}

function getFecha ()
{
    var hoy = new Date();
    //fecha
    let dia = hoy.getDate();
    let mes = parseInt(hoy.getMonth())+parseInt(1);
    let ano = hoy.getFullYear();

    if(dia<10)
    {
      dia = "0"+hoy.getDate();
    }
    if(mes<10)
    {
        mes = "0"+mes;
    }
    var fecha = ano+"-"+mes+"-"+dia;
    return fecha;
}
