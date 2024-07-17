//permisos de usuario
let permisos = Array();
let permisosEditar = Array();

function activarPermisoAdministrar()
{
  permisos = Array();
  let tipoUsuario = $("#slctTipoUsuario").val()
  if(tipoUsuario==1)
  {
    $("#swAdministrar").prop("checked", true);
    $("#swAdministrar").prop("disabled", false);
    $("#swVender").prop("checked", true);
    permisos.push(1,2);
  }
  else
  {
    $("#swAdministrar").prop("checked", false);
    $("#swAdministrar").prop("disabled", true);
    $("#swVender").prop("checked", true);
    permisos.push(2);
  }
}


$("#swAdministrar").on("click", function(e)
{
  if(e.target.checked)
  {
    permisos.push(1);
  }
  else
  {
    permisos = permisos.filter(user => user != 1)
  }
  permisos.sort();
})
$("#swVender").on("click", function(e)
{
  if(e.target.checked)
  {
    permisos.push(2);
  }
  else
  {
    permisos = permisos.filter(user => user != 2)
  }
  permisos.sort();

})