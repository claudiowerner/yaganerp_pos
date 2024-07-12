/* ---------------------------------------------- FUNCIONES AJAX ------------------------------------- */
function editarProductoAjax(datos)
{
    return $.ajax({
        url:"funciones/editar_producto_exe.php",
        type: "POST",
        data: datos,
        async: false
    }).responseText;
}





/* ----------------------------------------------- ACCIONES DOM -------------------------------------- */
function abrirModalEditar(pesaje, id, codigo_barra, nombre_prod, id_categoria, id_proveedor, 
    cantidad, valor_neto, margen_ganancia, monto_ganancia, valor_venta, descuento)
{
    let proveedores = cargarProveedores();
    $("#slctProveedorProductoEditar").html(proveedores);   
    $("#modalEditar").modal("show");
    cargarUnidadEspecifica(id);
    abrirProductoEspecifico(id);
    
    
    //Validar si el producto seleccionado tiene pesaje



    $("#nomProdEditar").val(nombre_prod);
    $("#txtCodBarraEditar").val(codigo_barra);
    $("#margenGananciaEditar").val(margen_ganancia);
    $("#valorNetoEditar").val(valor_neto);
    $("#montoGananciaEditar").val(monto_ganancia);
    $("#valorVentaEditar").val(valor_venta);
    $("#txtCantidadEditar").val(cantidad);
    $("#porcDesctoEditar").val(descuento); 
    $("#slctProveedorProductoEditar").val(id_proveedor); 
    $("#listCatEditar").val(id_categoria);
    
    $("#swPesajeEditar").prop("checked", pesaje);
    
    $("#tituloModalEditar").html(nombre_prod);
    $("#idProductoEditar").html(id);
    $("#porcDesctoEditar").val(0);
}


//editar producto


$("#btnEditarProducto").on("click", function(e)
{
    let id = $("#idProductoEditar").text();
    let np = $("#nomProdEditar").val();
    let cod_barra = $("#txtCodBarraEditar").val();
    let lc = $("#listCatEditar").val();
    let can = $("#txtCantidadEditar").val();
    let vn = $("#valorNetoEditar").val();
    let vv = $("#valorVentaEditar").val();
    let unid = $("#slctUnidadEditar").val();
    let marGan = $("#margenGananciaEditar").val();
    let monGan = $("#montoGananciaEditar").val();
    let proveedor = $("#slctProveedorProductoEditar").val();
    let descto = $("#porcDesctoEditar").val();

    if(id==""||np==""||cod_barra==""||lc==""||can==""||vn==""||vv==""||unid==""||marGan==""||monGan==""||proveedor==""||descto=="")
    {
        msjes_swal("Aviso", "Debe rellenar todos los campos", "warning");
    }
    else
    {
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

        let respuesta = editarProductoAjax(datos);
        let json = JSON.parse(respuesta);

        msjes_swal(json.titulo, json.mensaje, json.icono);

        if(json.edicion)
        {
            $('#producto').DataTable().ajax.reload();
            $("#modalEditar").modal("hide");
        }

    }
});
