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
                        `<option value="${fecha.fecha}">${fecha.fecha}</option>`;
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
    fecha = $("#ventasPorDia").val();
    var ctx = document.getElementById("gananciaHora").getContext('2d');
    if (grafica!=null)
    {
        console.log(ctx); 
    }
    
}

function crearGrafico()
{
    // Obtener una referencia al elemento canvas del DOM
    var grafica = document.querySelector("#grafic");
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
    $.ajax({
        url:url,
        type: "GET",
        success: function(resp)
        {
            var meses = JSON.parse(resp);
            e = meses[0]['Enero'];
            f = meses[1]['Febrero'];
            mar = meses[2]['Marzo'];
            a = meses[3]['Abril'];
            may = meses[4]['Mayo'];
            jn = meses[5]['Junio'];
            jl = meses[6]['Julio'];
            ag = meses[7]['Agosto'];
            s = meses[8]['Septiembre'];
            o = meses[9]['Octubre'];
            n = meses[10]['Noviembre'];
            d = meses[11]['Diciembre'];

            // Podemos tener varios conjuntos de datos. Comencemos con uno
            const datosVentas2020 = {
                label: "Ventas por mes",
                data: [e, f, mar, a, may, jn, jl, ag, s, o, n, d], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas 
                backgroundColor: 'rgba(54, 162, 235, 0.2)', // Color de fondo
                borderColor: 'rgba(54, 162, 235, 1)', // Color del borde 
                borderWidth: 1,//Ancho del borde 
            }; 
            new Chart(grafica, { 
                type: 'bar',// Tipo de gráfica 
                data:
                {
                    labels: ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
                    datasets: [ 
                        datosVentas2020,
                        // Aquí más datos...
                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }],
                    },
                }
            });
        }
    })

}


function crearGraficoVentaHora(fecha)
{

    $.ajax({
        url:"graficos/read_ganancia_horas.php?fecha="+fecha,
        type: "GET",
        success: function(resp)
        {
            var hora = JSON.parse(resp);

            //lectura de datos por horas
            var h0 = hora[0]["h0"];
            var h1 = hora[1]["h1"];
            var h2 = hora[2]["h2"];
            var h3 = hora[3]["h3"];
            var h4 = hora[4]["h4"];
            var h5 = hora[5]["h5"];
            var h6 = hora[6]["h6"];
            var h7 = hora[7]["h7"];
            var h8 = hora[8]["h8"];
            var h9 = hora[9]["h9"];
            var h10 = hora[10]["h10"];
            var h11 = hora[11]["h11"];
            var h12 = hora[12]["h12"];
            var h13 = hora[13]["h13"];
            var h14 = hora[14]["h14"];
            var h15 = hora[15]["h15"];
            var h16 = hora[16]["h16"];
            var h17 = hora[17]["h17"];
            var h18 = hora[18]["h18"];
            var h19 = hora[19]["h19"];
            var h20 = hora[20]["h20"];
            var h21 = hora[21]["h21"];
            var h22 = hora[22]["h22"];
            var h23 = hora[23]["h23"];
            // Podemos tener varios conjuntos de datos. Comencemos con uno
            const datosVentas2020 = {
                label: "Ventas por hora",
                data: [h0,h1,h2,h3,h4,h5,h6,h7,h8,h9,h10,h11,h12,h13,h14,h15,h16,h17,h18,h19,h20,h21,h22,h23], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas 
                backgroundColor: 'rgba(54, 162, 235, 0.2)', // Color de fondo
                borderColor: 'rgba(54, 162, 235, 1)', // Color del borde 
                borderWidth: 1,//Ancho del borde 
            }; 
            new Chart(grafica, { 
                type: 'line',// Tipo de gráfica 
                data:
                {
                    labels: ["00:00","01:00","02:00","03:00","04:00","05:00","06:00","07:00","08:00","09:00","10:00","11:00",
                             "12:00","13:00","14:00","15:00","16:00","17:00","18:00","19:00","20:00","21:00","22:00","23:00"],
                    datasets: [ 
                        datosVentas2020,
                        // Aquí más datos...
                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }],
                    },
                }
            });
        }
    })
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
