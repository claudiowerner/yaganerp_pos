//permisos de usuario
let permisosEditar = Array();

function activarPermisoAdministrarEditar()
{
  permisosEditar = Array();
  let tipoUsuario = $("#slctTipoUsuarioEditar").val()
  if(tipoUsuario==1)
  {
    $("#swAdministrarEditar").prop("checked", true);
    $("#swAdministrarEditar").prop("disabled", false);
    $("#swVenderEditar").prop("checked", true);
    permisosEditar.push(1,2);
  }
  else
  {
    $("#swAdministrarEditar").prop("checked", false);
    $("#swAdministrarEditar").prop("disabled", true);
    $("#swVenderEditar").prop("checked", true);
    permisosEditar.push(2);
  }
}


$("#swAdministrar").on("click", function(e)
{
  if(e.target.checked)
  {
    permisosEditar.push(1);
  }
  else
  {
    permisosEditar = permisosEditar.filter(user => user != 1)
  }
  permisosEditar.sort();
})
$("#swVender").on("click", function(e)
{
  if(e.target.checked)
  {
    permisosEditar.push(2);
  }
  else
  {
    permisosEditar = permisosEditar.filter(user => user != 2)
  }
  permisosEditar.sort();

})