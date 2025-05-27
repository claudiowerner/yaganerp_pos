/* ------------------------------------------ FUNCION AJAX --------------------------------------------------------- */
function cargarPlanAjax()
{
    return $.ajax({
        url: "php/planes/read_planes_select.php",
        type: "POST",
        async: false
    }).responseText;
}
/* --------------------------------------------------- FUNCION DOM ------------------------------------------------- */

$("#slctPlan").select2();
$("#slctPlanEditar").select2();
$("#slctPlanContratado").select2();
$("#slctPlanContratadoEditar").select2();

function cargarPlan()
{
    let descarga = cargarPlanAjax();
    let json = JSON.parse(descarga)
    let template = "<option value=0>SELECCIONE UNA OPCIÓN</option>";
    json.forEach(d=>{
        template = template + 
        `<option value=${d.id}>${d.nombre}</option>`;
    })
    $("#slctPlan").html(template);
    $("#slctPlanEditar").html(template);
    $("#slctPlanContratado").html(template);
    $("#slctPlanContratadoEditar").html(template);
}