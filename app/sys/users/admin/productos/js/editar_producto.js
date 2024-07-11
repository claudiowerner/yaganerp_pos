//editar producto


$("#formEditarProducto").submit(function(e)
{
    let proveedores = cargarProveedores();
    $("#slctProveedorEditar").html(proveedores);
    e.preventDefault();
    let id = $("#tituloModalEditar").text();
    let np = $("#nomProdEditar").val();
    let cod_barra = $("#txtCodBarraEditar").val();
    let lc = $("#listCatEditar").val();
    let can = $("#txtCantidadEditar").val();
    let vn = $("#valorNetoEditar").val();
    let vv = $("#valorVentaEditar").val();
    let unid = $("#slctUnidadEditar").val();
    let marGan = $("#margenGananciaEditar").val();
    let monGan = $("#montoGananciaEditar").val();
    let proveedor = $("#slctProveedorEditar").val();
    let descto = parseInt($("#porcDesctoEditar").val());

    
    let pesaje = "";

    //hora
    let hora = getHora();
    let datos = 
    {
        "codigo_barra":cod_barra,
        "id":id,
        "nomProd":np,
        "cat":lc,
        "can":can,
        "vv":vv,
        "vn":vn,
        "estado":ep,
        "hora":hora,
        "medida":unid,
        "pesaje":rpEditar,
        "marGan": marGan,
        "monGan": monGan,
        "proveedor": proveedor,
        "descuento": descto
    };

    $.ajax({
        url:"productos/editar_producto_exe.php",
        type: "POST",
        data: datos,
        success: function(e)
        {
            if(e.match("correctamente"))
            {
                msjes_swal("Excelente", e, "success");
            }
            if(e.match("No se puede desactivar"))
            {
                msjes_swal("Aviso", e, "warning");
            }
            if(e.match("Error")||e.match("error"))
            {
                msjes_swal("Error al modificar", e, "error");
            }
            $('#producto').DataTable().ajax.reload();
            $("#formRegistro").trigger('reset');
            $("#modalEditar").modal("hide");
        }
        })
        .fail(function(e)
        {
        console.log(e.responseText);
        })
});
