

$("#slctGiros").select2();
$("#configProducto").on("click", function(e)
{
  $("#modalConfProd").modal("show");
});

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