/* -------------------------------------------- FUNCION AJAX ----------------------------------------- */
function descargarMes(año)
{
    return $.ajax({
        url: "graficos/php/calendario/mes_venta/mes_venta.php",
        data: {"año": año},
        type: "POST",
        async: false
    }).responseText;
}

/* --------------------------------------------- FUNCION DOM ----------------------------------------- */

function cargarMes(año)
{
    $("#modalMesVenta").modal("show");
    $("#modalAñoVenta").modal("hide");
    
    let descarga = descargarMes(año);
    let json = JSON.parse(descarga);
    let template = "";
    json.forEach(j=>{
        template +=`<button class='${j.mes_actual}' style="margin: 10px" onclick=calendario(${año},${j.nro_mes})><h1>${j.mes}</h1></button>`;
    });
    $("#mesVenta").html(template);
}