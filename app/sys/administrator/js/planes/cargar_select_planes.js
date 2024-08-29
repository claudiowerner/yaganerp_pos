
$("#slctPlan").select2();
$("#slctPlanEditar").select2();
function cargarPlan()
{
  $.ajax({
    url: "php/planes/read_planes_select.php",
    type: "POST",
    success: function(e)
    {
      json = JSON.parse(e)
      template = "<option value=0>SELECCIONE UNA OPCIÓN</option>";
      json.forEach(d=>
        {
            template = template + 
            `<option value=${d.id}>${d.nombre}</option>`;
        })
        $("#slctPlan").html(template);
        $("#slctPlanEditar").html(template);
        $("#slctPlanContratado").html(template);
        $("#slctPlanContratadoEditar").html(template);
    }
  })
}
