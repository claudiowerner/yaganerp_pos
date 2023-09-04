function cambiarProveedor()
{
    let idProv = $("#slctProveedorEditar").val();
    let id_pedido = $("#idModal").text();
    let datos = {
        "id_prov": idProv,
        "id_pedido": id_pedido
    }
    $.ajax(
        {
            url:"editar_proveedor.php",
            data:datos,
            type: "POST",
            success: function(e)
            {
                msjes_swal("Excelente", e, "success");
                $('#pedidos').DataTable().ajax.reload();
            }
        }
    )
}