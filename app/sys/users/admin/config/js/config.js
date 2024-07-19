

$("#slctGiros").select2();

$("#configConvenio").on("click", function(e)
{
  $("#modalConfConvenio").modal("show");
});

$("#planContratado").on("click", function(e)
{
  $("#modalPlanContratado").modal("show");

  let plan = descargarPlan(); 
  $("#nombrePlan").html(plan);
})