/* --------------------------------------------- FUNCION AJAX ------------------------------------------------------ */
function guardarPeriodoAjax(id_cl, idc, idp)
{
    let datos = {
        "id_cliente": id_cl,
        "comprobante": idc,
        "id_pago": idp
    };
    return $.ajax({
        url: "php/cliente/comprobante/editar_comprobante.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText;
}


/* --------------------------------------------- FUNCTION DOM ------------------------------------------------------ */
function editarPeriodo(id_pago)
{
    $("#modalEditarPeriodo").modal("show");
    let id_cliente = $("#idClientePagar").text();
    $("#idPagoEditarComprobante").html(id_pago);
    cargarPeriodosEditarComprobante(id_cliente);
}

$("#btnEditarPeriodo").on("click", function(e)
{
    //id periodo
    let id_p = $("#slctPeriodoComprobanteEditar").val();
    //id comprobante
    let id_c = $("#idPagoEditarComprobante").text();
    //id cliente
    let id_cl = $("#idClientePagar").text();

    if(id_p==0)
    {
        msjes_swal("Aviso", "Debe seleccionar un periodo válido.", "warning");
    }
    else
    {
        let descarga_validar_pago = validarPagoEnUso(id_cl, id_p);
        let j = JSON.parse(descarga_validar_pago);
        let validar_pago = j.num_comprobantes;
        if(validar_pago==0)
        {
            let respuesta = guardarPeriodoAjax(id_cl, id_c, id_p);
            let j = JSON.parse(respuesta);
    
            msjes_swal(j.titulo, j.mensaje, j.icono);
            
            if(j.editar_comprobante)
            {
                $("#tablaComprobantes").DataTable().ajax.reload();
                $("#modalEditarPeriodo").modal("hide");
            }
        }
        else
        {
            msjes_swal("Aviso", "Seleccione otro periodo", "warning");
        }
    }

    
    
});