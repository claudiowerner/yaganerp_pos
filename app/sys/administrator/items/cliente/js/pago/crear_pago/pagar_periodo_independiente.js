/* ----------------------------------------------- FUNCTION AJAX ------------------------------------------------- */
function pagarPeriodoAjax(id)
{
    return $.ajax({
        url: "php/cliente/pagos/registrar_pago_particular.php",
        data: {"id": id},
        type: "POST",
        async: false
    }).responseText;
}


/* ------------------------------------------------ FUNCION DOM -------------------------------------------------- */
function pagarPeriodo(id)
{
    swal({
        title: "¿Está seguro?",
        text: `¿Desea registrar el pago?`,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((pagar) => {
        if (pagar)
        {
            let respuesta = pagarPeriodoAjax(id);
            let j = JSON.parse(respuesta);
            msjes_swal(j.titulo, j.mensaje, j.icono)
            $('#tablaPagos').DataTable().ajax.reload();
        }
        else 
        {
            msjes_swal("Operación cancelada");
        }
    });
}