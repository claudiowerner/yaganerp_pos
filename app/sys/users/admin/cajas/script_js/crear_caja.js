//funcion que guarda los datos en la BD
function crearCaja(nombre, fecha)
{
    let datos = {
        "nomCaja": nombre,
        "fecha": fecha
    }
    return $.ajax({
    url:"script_php/crear_caja.php?",
    data: datos,
    type: "POST",
    async: false
  }).responseText;
}


$("#btnAgregarCaja").on("click", function(e)
{
  $("#modalRegistro").modal("show");
});



$("#btnGuardar").on("click", function(e)
{
    let nombre = $("#nomCaja").val();
    if(nombre!="")
    {
      let fecha = getFecha();
      let respuestaCrearCaja = crearCaja(nombre, fecha);
      let json = JSON.parse(respuestaCrearCaja);

      msjes_swal(json.titulo, json.mensaje, json.icono);
      cargarCajasActivas();
      $('#producto').DataTable().ajax.reload();
      $("#modalRegistro").modal("hide");
      $("#errNomPiso").html("");
    }
    else
    {
      
      $("#errNomPiso").html("Debe rellenar este campo");
    }

  });