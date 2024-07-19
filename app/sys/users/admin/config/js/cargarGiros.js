/* ------------------------------------------ FUNCION AJAX ------------------------------------------- */
function cargarGirosAjax()
{
  return $.ajax({
    url: "script_php/info_cuentas/cargarGiros.php",
    type: "POST",
    async: false
  }).responseText;
}


/* ---------------------------------------- FUNCION DOM ---------------------------------------------- */

function cargarGiros()
{
  let descarga = cargarGirosAjax()
  let json = JSON.parse(descarga);
  let template = "";
  json.forEach(d=>{
    template = template + `<option value=${d.id}>${d.nombre}</option>`;
  })
  $("#slctGiros").html(template);
}

cargarGiros();




