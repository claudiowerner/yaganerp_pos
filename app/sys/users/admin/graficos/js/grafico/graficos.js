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
rellenarSelectAño();
crearGrafico();
crearGraficoVentaHora(getFecha());


function getFecha()
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
    return fecha;
}
