/* ----------------------------------------------- FUNCION AJAX ------------------------------------------ */
function descargarInfoCliente(id)
{
    return $.ajax({
        url: "php/cliente/clientes/read_info_cliente_seleccionado.php",
        data: {"id":id},
        type: "POST",
        async: false
    }).responseText;
}
/* ----------------------------------------------- FUNCION DOM ------------------------------------------- */
function mostrarInfo(id)
{
    //accion dom
    $("#modalInfoClientes").modal("show");

    //accion de descarga de info
    let descargar = descargarInfoCliente(id);
    try
    {
        let json = JSON.parse(descargar);
        $("#tituloCliente").html(json.nombre);
        $("#idClienteInfo").html(id);
        let estado = estadoClientePago(json.estado);

        let estado_pago = estadoClientePago(json.estado_pago);

        $("#nombreInfoCliente").html(json.nombre);
        $("#rutInfoCliente").html(json.rut);
        $("#estadoInfoCliente").html(estado);
        $("#correoInfoCliente").html(json.correo);
        $("#telefonoInfoCliente").html(json.telefono);
        $("#plan_compradoInfoCliente").html(json.plan_comprado);
        $("#nom_fantasiaInfoCliente").html(json.nom_fantasia);
        $("#razon_socialInfoCliente").html(json.razon_social);
        $("#direccionInfoCliente").html(json.direccion);
        $("#fechaRegistroInfoCliente").html(json.fecha_registro);
        $("#fecha_desdeInfoCliente").html(json.fecha_desde);
        $("#fecha_hastaInfoCliente").html(json.fecha_hasta);
        $("#estado_pagoInfoCliente").html(estado_pago);
        $("#giroInfoCliente").html(json.giro);
    }
    catch(e)
    {
        console.error(e)
    }
}
$("#btnAbrirEdicion").on("click", function(e)
{
    let idCliente = $("#idClienteInfo").text();
    
    $("#modalInfoClientes").modal("hide");
    abrirModalEditar(idCliente)
})
function estadoClientePago(estado)
{
    let retorno;
    if(estado)
    {
        retorno = "ACTIVO";
    }
    else
    {
        retorno = "INACTIVO";
    }
    return retorno;
}