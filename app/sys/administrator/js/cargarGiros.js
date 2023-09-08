
$("#slctGiros").select2();
$.ajax({
  url: "php/cliente/cargarGiros.php",
  type: "POST",
  success: function(e)
  {
    json = JSON.parse(e)
    template = "";
    json.forEach(d=>
      {
          template = template + 
          `<option value=${d.id}>${d.nombre}</option>`;
      })
      $("#slctGiros").html(template);
      $("#slctGirosEditar").html(template);
  }
})