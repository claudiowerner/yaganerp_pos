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

cargarFechas();
crearGrafico();
crearGraficoVentaHora();
rellenarSelectAño();


function cambioFecha()
{
    let fecha = $("#ventasPorDia").val();

    crearGraficoVentaHora(fecha); 
    
}