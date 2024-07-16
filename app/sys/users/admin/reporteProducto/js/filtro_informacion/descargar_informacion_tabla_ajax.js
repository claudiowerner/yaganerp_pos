/* --------------------------------------- DESCARGAR INFORMACION FILTRADA ----------------------------- */
function descargarInfoTablaCategorias(fecha_inicio, fecha_fin)
{
    let datos = {
        "fecha_inicio": fecha_inicio,
        "fecha_fin": fecha_fin,
    };
    return $.ajax({
        url: "funciones_php/graficos/info_filtrada/tablas/read_ventas_por_categoria.php",
        data: datos, 
        type: "POST",
        async: false
    }).responseText;
}

function descargarInfoTablaProductos(fecha_inicio, fecha_fin)
{
    let datos = {
        "fecha_inicio": fecha_inicio,
        "fecha_fin": fecha_fin,
    };
    return $.ajax({
        url: "funciones_php/graficos/info_filtrada/tablas/read_cant_productos_vendidos.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText;
}

function descargarInfoTablaCategorias(fecha_inicio, fecha_fin)
{
    let datos = {
        "fecha_inicio": fecha_inicio,
        "fecha_fin": fecha_fin,
    };
    return $.ajax({
        url: "funciones_php/graficos/info_filtrada/tablas/read_ventas_por_categoria.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText;
}


function descargarInfoTablaProductos(fecha_inicio, fecha_fin)
{
    let datos = {
        "fecha_inicio": fecha_inicio,
        "fecha_fin": fecha_fin,
    };
    return $.ajax({
        url: "funciones_php/graficos/info_filtrada/tablas/read_cant_productos_vendidos.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText;
}










/* ----------------------------------------- DESCARGAR INFO SIN FILTRAR -------------------------------*/

function descargarInfoTablaCategoriasSinFiltrar()
{
    return $.ajax({
        url: "funciones_php/graficos/info_sin_filtrar/read_ventas_por_categoria.php",
        type: "POST",
        async: false
    }).responseText;
}



function descargarInfoTablaProductosSinFiltrar()
{
    return $.ajax({
        url: "funciones_php/graficos/info_sin_filtrar/read_cant_productos_vendidos.php",
        type: "POST",
        async: false
    }).responseText;
}


function descargarInfoTablaCategoriasSinFiltrar()
{
    return $.ajax({
        url: "funciones_php/graficos/info_sin_filtrar/read_ventas_por_categoria.php",
        type: "POST",
        async: false
    }).responseText;
}

function descargarInfoTablaProductosSinFiltrar()
{
    return $.ajax({
        url: "funciones_php/graficos/info_sin_filtrar/read_cant_productos_vendidos.php",
        type: "POST",
        async: false
    }).responseText;
}

