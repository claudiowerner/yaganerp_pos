
$("#btnGuardar").on("click", function(e)
{
  e.preventDefault();
  let nombre = $("#nomCliente").val();
  let rut = $("#rut").val();
  let correo = $("#correo").val();
  let telefono = $("#telefono").val();
  let direccion = $("#direccion").val();
  let plan = $("#slctPlan").val();
  let fechaRegistro = getFecha();
  let fechaDesde = $("#fechaDesde").val();
  let fechaHasta = $("#fechaDesde").val();
  let nomFantasia = $("#nomFantasia").val();
  let razonSocial = $("#razonSocial").val();
  let tipoPago = $("#tipoPago").val();
  let giro = $("#slctGiros").val();
  if(nombre==""||rut==""||correo==""||telefono==""||direccion==""||plan==""||fechaDesde==""||fechaHasta==""||nomFantasia==""||razonSocial=="")
  {
    msjes_swal("Aviso", "Debe rellenar todos los campos", "warning");
  }
  else
  {
    datos = {
      "nombre": nombre,
      "rut":rut,
      "correo":correo,
      "telefono":telefono,
      "direccion":direccion,
      "plan":plan,
      "fechaRegistro":fechaRegistro,
      "fechaHasta":fechaHasta,
      "fechaDesde":fechaDesde,
      "nomFantasia":nomFantasia,
      "razonSocial":razonSocial,
      "giro":giro,
      "tipoPago":tipoPago,
      "fecha_pago":fechaDesde
    }
    console.log(datos)
    $.ajax({
      url:"php/cliente/crear_cliente.php",
      data: datos,
      type: "POST",
      success: function(e)
      {
        if(e.match("correctamente"))
        {
          msjes_swal("Excelente", e, "success");
        }
        if(e.match("Error")||e.match("error"))
        {
          msjes_swal("Error al modificar", e, "error");
        }
        $('#producto').DataTable().ajax.reload();
        $("#modalRegistro").modal("hide");
      }
    })
    .fail(function(e)
    {
      console.log(e.responseText);
    })
  }
});