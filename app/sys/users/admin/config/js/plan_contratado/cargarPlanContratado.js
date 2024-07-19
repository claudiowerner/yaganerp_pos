

function descargarPlan()
{
    return $.ajax(
        {
            url: "script_php/plan_contratado/read_plan_contratado.php",
            type: "POST",
            async: false
        }
    ).responseText;

}


$("#planContratado").on("click", function(e)
{
  $("#modalPlanContratado").modal("show");

  let plan = descargarPlan(); 
  $("#nombrePlan").html(plan);
})