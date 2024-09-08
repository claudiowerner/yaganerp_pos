
$("#btnAgregarPlan").on("click", function(e)
{
  $("#modalRegistrarPlan").modal("show");
})

ep = ""; //almacena el estado del plan (switch)
var table;



//modificar plan
$("#planes").on("click", "tr", function(e)
{
  e.preventDefault();
  var cat = $("#planes").DataTable();
  var datos = cat.row(this).data();
  $("#modalEditarPlan").modal('show'); 


  $("#nomPlanEditar").val(datos.nombre);
  $("#numUsuariosEditar").val(datos.usuarios);
  $("#numCajasEditar").val(datos.cajas);
  $("#idPlan").html(datos.id)

  //eliminar signo $ del valor. El valor que viene desde la BD viene de la siguiente manera: $123456
  dato = datos.valor;
  valor = dato.slice(1);
  $("#valorPlanEditar").val(valor);
  
  if(datos.estado == "ACTIVO")
  {
    $("#swEstadoPlan").prop("checked", true);
    ec = "S";
  }
  else
  {
    $("#swEstadoPlan").prop("checked", false);
    ec = "N";
  }
  
});



$("#swEstadoPlan").on("click", function(e)
{
  if(e.target.checked)
  {
    ep = "S";
  }
  else
  {
    ep = "N";
  }
})

$("#btnModificarPlan").on("click", function(e)
{
  let idPlan = $("#idPlan").text();
  let nomPlan = $("#nomPlanEditar").val();
  let numUsuarios = $("#numUsuariosEditar").val();
  let numCajas = $("#numCajasEditar").val();
  let valorPlan = $("#valorPlanEditar").val();

  datos = {
    "id": idPlan,
    "nombre": nomPlan,
    "usuarios": numUsuarios,
    "cajas": numCajas,
    "valor": valorPlan,
    "estado": ep
 }
    e.preventDefault();
    $.ajax({
      url:"php/planes/editar_plan.php",
      data: datos, 
      type: "POST",
      success: function(e)
      {
        if(e.match("correctamente"))
        {
          msjes_swal("Excelente", e, "success");
        }
        if(e.match("No se puede desactivar el plan porque existen clientes activos que tienen este plan contratado"))
        {
          msjes_swal("Aviso", e, "warning");
        }
        if(e.match("Error")||e.match("error"))
        {
          msjes_swal("Error al modificar", e, "error");
        }
        $('#planes').DataTable().ajax.reload();
        $("#modalEditar").modal("hide");
        cargarPlan();
      }
    })
    .fail(function(e)
    {
      console.log(e.responseText);
    })
  
});

function getFecha ()
{
  var hoy = new Date();
  //fecha
  let dia = hoy.getDate();
  let mes = hoy.getMonth()+1;
  let ano = hoy.getFullYear();

  if(dia<10)
  {
    dia = "0"+hoy.getDate();
  }
  if(mes<10)
  {
    mes = "0"+hoy.getMonth();
  }
  var fecha = ano+"-"+mes+"-"+dia;
  return fecha;
}
