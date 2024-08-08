
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

function registrarPago(datos)
{
  return $.ajax({
    url: "php/cliente/pagos/crear_pago.php",
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
  let nomFantasia = $("#nomFantasia").val();
  let razonSocial = $("#razonSocial").val();
  let tipoPago = $("#tipoPago").val();
  let giro = $("#slctGiros").val();
  let plazo = $("#slctPlazoPago").val();

  if(
    rut == "" ||
    nombre == "" ||
    correo == "" ||
    telefono == "" ||
    direccion == "" ||
    plan == "" ||
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
      
      if(nombre==""||rut==""||correo==""||telefono==""||direccion==""||plan==""||nomFantasia==""||razonSocial=="")
      {
        msjes_swal("Aviso", "Debe rellenar todos los campos", "warning");
      }
      else
      {
        let rutRepetido = validarRut(rut)
        if(rutRepetido>0)
        {
          msjes_swal("Aviso", "El rut ingresado ya existe", "warning")
        }
        else
        {
          let datos = {
            "nombre": nombre,
            "rut":rut,
            "nomFantasia":nomFantasia,
            "razonSocial":razonSocial,
            "giro":giro,
            "direccion":direccion,
            "correo":correo,
            "telefono":telefono,
            "plan":plan,
            "plazo":plazo
          }
          //registro cliente
          let regCliente = registrarCliente(datos);
          let cliente = JSON.parse(regCliente);

          //registro pago
          let datosPago = {
            "rut": rut,
            "plazo": plazo,
            "plan": plan,
            "tipoPago": tipoPago
          }

          let respPago = registrarPago(datosPago);
          let pago = JSON.parse(respPago)

          if(cliente.registro&&pago.registro)
          {
            msjes_swal("Excelente", "Cliente registrado correctamente", "success");

            //envío de correo de registro
            let datosCorreo = {
              "correo": correo, 
              "nombre": nombre
            }
            $("#modalEnviarCorreo").modal("show");
            let enviar_correo = enviarCorreoRegistro(datosCorreo);
            $("#modalEnviarCorreo").modal("hide")
            $('#producto').DataTable().ajax.reload();
            $("#modalRegistro").modal("hide");
          }
          else
          {
            msjes_swal("Error", "Error al registrar cliente", "error");
          }
        }
      }

    }
    else
    {
      msjes_swal("Aviso", "El formato del R.U.T. es inválido. Debe ser: xxxxxxxx-x", "warning");
    }
  }


  
  
});