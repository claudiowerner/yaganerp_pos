
/* ------------------------------------------- FUNCIONES AJAX --------------------------------------- */

function registrarCliente(datos)
{
  return $.ajax({
    url:"php/cliente/clientes/crear_cliente.php",
    data: datos,
    type: "POST",
    async: false
  }).responseText;
}

/* -------------------------------------------- FUNCIONES DOM --------------------------------------- */
$("#btnGuardar").on("click", function(e)
{
  
  let rut = $("#rut").val();
  let nombre = $("#nomCliente").val();
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

  if(
    rut == "" ||
    nombre == "" ||
    correo == "" ||
    telefono == "" ||
    direccion == "" ||
    plan == "" ||
    fechaRegistro == "" ||
    fechaDesde == "" ||
    fechaHasta == "" ||
    nomFantasia == "" ||
    razonSocial == "" ||
    tipoPago == "" ||
     giro == "")
  {
    msjes_swal("Aviso", "Debe rellenar todos los campos", "warning")
  }
  else
  {
    let rut_valido = fnValidarRut.validaRut(rut)
    if(rut_valido)
    {
      
      if(nombre==""||rut==""||correo==""||telefono==""||direccion==""||plan==""||fechaDesde==""||fechaHasta==""||nomFantasia==""||razonSocial=="")
      {
        msjes_swal("Aviso", "Debe rellenar todos los campos", "warning");
      }
      else
      {
        let datos = {
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
        
        let respuesta = registrarCliente(datos);
        let json = JSON.parse(respuesta);

        alert(respuesta);

        
        $('#producto').DataTable().ajax.reload();
        $("#modalRegistro").modal("hide");
      }

    }
    else
    {
      msjes_swal("Aviso", "El formato del R.U.T. es inválido. Debe ser: xxxxxxxx-x", "warning");
    }
  }


  
  
});