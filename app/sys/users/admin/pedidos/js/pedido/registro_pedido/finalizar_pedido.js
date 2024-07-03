
$("#btnFinalizarPedido").on("click", function(e)
{
    $('#pedidos').DataTable().ajax.reload();
    $("#modalRegistro").modal("hide");
})