/* --------------------------------------------- FUNCIONES AJAX ------------------------------------- */

//descargar info del cliente seleccionado
function descargarInfoCliente(id)
{
    return $.ajax({
        url: "php/cliente/clientes/read_cliente_seleccionado.php",
        data: {"id":id},
        type: "POST",
        async: false
    }).responseText;
}


function guardarEdicion(datos)
{
    return $.ajax({
        url:"php/cliente/clientes/editar_cliente.php",
        data: datos, 
        type: "POST",
        async: false
    }).responseText;
}


/* ---------------------------------------------- FUNCIONES DOM ------------------------------------- */
function abrirModalEditar(id)
{
    let descargar = descargarInfoCliente(id);
    let datos = JSON.parse(descargar);

    $("#tituloClienteEditar").html(datos.nombre);
    $("#idCliente").html(id);
    $("#nomClienteEditar").val(datos.nombre);
    $("#rutEditar").val(datos.rut);
    $("#correoEditar").val(datos.correo);
    $("#telefonoEditar").val(datos.telefono);
    $("#direccionEditar").val(datos.direccion);
    $("#slctPlanEditar").val(datos.plan_comprado);
    $("#fechaPagoEditar").val(datos.fecha_pago);
    $("#nomFantasiaEditar").val(datos.nom_fantasia);
    $("#razonSocialEditar").val(datos.razon_social);
    $("#slctGirosEditar").select(datos.giro);
    $("#slctPlazoPagoEditar").select(datos.plazo_pago);

    let estado = datos.estado;
    let estado_pago = datos.estado_pago;

    $("#swEstadoCliente").prop("checked", estado);
    $("#swEstadoPago").prop("checked", estado_pago);
    
    $("#modalEditar").modal("show");

    calcularPagoEditar();
}


$("#btnModificar").on("click", function()
{
    let id = $("#idCliente").text();
    let nombre = $("#nomClienteEditar").val();
    let rut = $("#rutEditar").val();
    let correo = $("#correoEditar").val();
    let telefono = $("#telefonoEditar").val();
    let direccion = $("#direccionEditar").val();
    let nomFantasia = $("#nomFantasiaEditar").val();
    let razonSocial = $("#razonSocialEditar").val();
    let fechaDesde = $("#fechaDesdeEditar").val();
    let fechaHasta = $("#fechaHastaEditar").val();
    let giro = $("#slctGirosEditar").val();
    let plazo_pago = $("#slctPlazoPagoEditar").val();
    let plan = $("#slctPlanEditar").val();
    let metodo_pago = $("#tipoPagoEditar").val();
    if(nombre==""||rut==""||correo==""||telefono==""||direccion==""||plan==""||fechaDesde==""||fechaHasta==""||nomFantasia==""||razonSocial=="")
    {
        msjes_swal("Aviso", "Debe rellenar todos los campos", "warning");
    }
    else
    {
        //validar si el tipo de pago, plazo de pago y método de pago es válido o no
        if(plazo_pago==0||plan==0||metodo_pago==0)
        {
            msjes_swal("Aviso", "El método de pago, Periodo de pago o Plan contratado, debe ser una opción válida.", "warning");
        }
        else
        {
            let datos = {
                "id": id,
                "nombre": nombre,
                "rut":rut,
                "correo":correo,
                "telefono":telefono,
                "direccion":direccion,
                "nomFantasia":nomFantasia,
                "razonSocial":razonSocial,
                "giro":giro
            }
            let editar = guardarEdicion(datos);
            let json = JSON.parse(editar);

            msjes_swal(json.titulo, json.mensaje, json.icono);
            if(json.edicion)
            {
                $("#modalEditar").modal("hide");
                $('#producto').DataTable().ajax.reload();
            }
            /*try
            {
                let json = JSON.parse(editar);

                msjes_swal(json.titulo, json.mensaje, json.icono);
                if(json.edicion)
                {
                    $("#modalEditar").modal("hide");
                    $('#producto').DataTable().ajax.reload();
                }
            }
            catch(e)
            {
                console.log(e);
                msjes_swal("Error", e.responseText, "error");
            }*/
        }
    }
});