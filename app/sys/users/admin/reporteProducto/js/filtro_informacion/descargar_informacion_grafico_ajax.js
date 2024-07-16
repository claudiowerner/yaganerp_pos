/* --------------------------------------- DESCARGAR INFORMACION FILTRADA -----------------------------*/
function descargarInfoGraficoBarraCategorias(fecha_inicio, fecha_fin)
{
    let datos = {
        "fecha_inicio": fecha_inicio,
        "fecha_fin": fecha_fin,
    };
    return $.ajax({
        url: "funciones_php/graficos/info_filtrada/graficos/read_ventas_por_categoria.php",
        data: datos, 
        type: "POST",
        async: false
    }).responseText;
}

function descargarInfoGraficoBarraProductos(fecha_inicio, fecha_fin)
{
    let datos = {
        "fecha_inicio": fecha_inicio,
        "fecha_fin": fecha_fin,
    };
    return $.ajax({
        url: "funciones_php/graficos/info_filtrada/graficos/read_cant_productos_vendidos.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText;
}

function descargarInfoGraficoTartaCategorias(fecha_inicio, fecha_fin)
{
    let datos = {
        "fecha_inicio": fecha_inicio,
        "fecha_fin": fecha_fin,
    };
    return $.ajax({
        url: "funciones_php/graficos/info_filtrada/graficos/read_ventas_por_categoria.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText;
}


function descargarInfoGraficoTartaProductos(fecha_inicio, fecha_fin)
{
    let datos = {
        "fecha_inicio": fecha_inicio,
        "fecha_fin": fecha_fin,
    };
    return $.ajax({
        url: "funciones_php/graficos/info_filtrada/graficos/read_cant_productos_vendidos.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText;
}










/* ----------------------------------------- DESCARGAR INFO SIN FILTRAR -------------------------------*/

function descargarInfoGraficoBarraCategoriasSinFiltrar()
{
    return $.ajax({
        url: "funciones_php/graficos/info_sin_filtrar/read_ventas_por_categoria.php",
        type: "POST",
        async: false
    }).responseText;
}



function descargarInfoGraficoBarraProductosSinFiltrar()
{
    return $.ajax({
        url: "funciones_php/graficos/info_sin_filtrar/read_cant_productos_vendidos.php",
        type: "POST",
        async: false
    }).responseText;
}


function descargarInfoGraficoTartaCategoriasSinFiltrar()
{
    return $.ajax({
        url: "funciones_php/graficos/info_sin_filtrar/read_ventas_por_categoria.php",
        type: "POST",
        async: false
    }).responseText;
}

function descargarInfoGraficoTartaProductosSinFiltrar()
{
    return $.ajax({
        url: "funciones_php/graficos/info_sin_filtrar/read_cant_productos_vendidos.php",
        type: "POST",
        async: false
    }).responseText;
}

