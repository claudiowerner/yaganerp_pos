$("#btnValidar").on('click', function(e)
{
  let clave = $("#claveCrearCaja").val();
  if(clave=='')
  {
    $("#msjClave").html("<span style='color: red'>Debe rellenar el campo</span>");
  }
  else
  {
    $.ajax(
    {
      url:"php/leer/clave_aut.php",
      data: {"clave": clave},
      type: "POST",
      success: function(e)
      {
        if(e==1)
        {
          $('#solicClaveAutAbrir').modal('hide'); 
          $('#abrirCaja').modal('show'); // abrir
        }
        else
        {
          $("#msjClave").html("<span style='color: red'>Clave incorrecta</span>");
        }
      }
    })
  }
});