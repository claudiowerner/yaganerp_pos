$(document).ready(function() {
  $("#btnGuardarCat").on('click', function()
  {
    
    let nomCat = $("#nomCat").val();
    let estadoCat = $("#estadoCat").val();

    let data = new Array();
    data = {
      nomCat:nomCat,
      estadoCat:estadoCat
    }
    $.post("crear_categoria_exe.php",data, function(r)
    {
      swal(
        {
          title: "Excelente",
          text: r,
          icon: "success"
        }
      )
    });
  
  });
  $("#btnModificar").on('click', function()
  {
    
    let idCat = document.getElementById('idCat').innerHTML;;
    let nomCat = $("#nomCat").val();
    let estadoCat = $("#estadoCat").val();

    console.log(idCat+" "+nomCat+" "+estadoCat);
    let data = new Array();
    data = {
      idCat:idCat,
      nomCat:nomCat,
      estadoCat:estadoCat
    }
    $.post("modificar_categoria_exe.php",data, function(r){
      swal(
        {
          title: "Excelente",
          text: r,
          icon: "success"
        }
      )
    });
  
  });
});
