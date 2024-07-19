/* -------------------------------------------- FUNCIONES AJAX --------------------------------------- */
function cargarUsuariosPermitidosAjax()
{
  return $.ajax(
    {
      url: "scripts/read_usuarios_permitidos.php",
      type: "POST",
      async: false
    }
  ).responseText;
}



/* -------------------------------------------- FUNCIONES DOM ---------------------------------------- */
function cargarUsuariosPermitidos()
{
  let usuarios_permitidos = cargarUsuariosPermitidosAjax();
  $("#us_permitidos").html(usuarios_permitidos)
}