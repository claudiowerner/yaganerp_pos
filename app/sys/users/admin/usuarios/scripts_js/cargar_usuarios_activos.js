/* ---------------------------------------- FUNCIONES AJAX ---------------------------------------------*/
function cargarUsuariosActivosAjax()
{
  return $.ajax(
    {
      url: "scripts/read_usuarios_activos.php",
      type: "POST",
      async: false,
    }
  ).responseText;
}

/* ----------------------------------------- FUNCIONES DOM ---------------------------------------------*/
function cargarUsuariosActivos()
{
  let usuarios_activos = cargarUsuariosActivosAjax();
  alert(usuarios_activos);
  $("#us_creados").html(usuarios_activos);  
}