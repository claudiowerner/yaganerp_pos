/* -------------------------------------------- FUNCIONES AJAX ---------------------------------------- */

function cargarFechasAjax()
{
    return $.ajax({
        url: "graficos/php/read_ganancias_fecha.php",
        type: "POST",
        async: false
    }).responseText;
}


/* ------------------------------------------- FUNCIONES DOM ------------------------------------------ */

function cargarFechas()
{
    let descargarFechas = cargarFechasAjax();
    let json = JSON.parse(descargarFechas)
    let template = "";
    json.forEach(fecha=>{
        template = template + `<option value="${fecha.fecha_formato_sql}">${fecha.fecha}</option>`;
    });
    $("#ventasPorDia").html(template);
    $("#ventasPorDia option[value='"+f+"']").attr("selected",true);
         
}
