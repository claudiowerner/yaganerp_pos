function abrirDetalles(pesaje, id, codigo_barra, nombre_prod, categoria, proveedor, cantidad, valor_neto, 
margen_ganancia, monto_ganancia,valor_venta,descuento, creado_por, fecha_reg)
{
    let requiere_pesaje = "No";
    if(pesaje)
    {
        requiere_pesaje = "Si";
    }
    $("#modalAbrirDetalles").modal("show");
    $("#detalleNombreProd").html(nombre_prod);

    $("#tdCodigoBarraProducto").html(codigo_barra);
    $("#tdNombreProducto").html(nombre_prod);
    $("#tdPesaje").html(requiere_pesaje);
    $("#tdNombreProveedor").html(proveedor);
    $("#tdNombreCategoria").html(categoria);
    $("#tdCantidadProducto").html(cantidad);
    $("#tdValorNeto").html(valor_neto);
    let margen_ganancia_formateado = formatearNumero("P", margen_ganancia)
    let monto_ganancia_formateado = formatearNumero("P", monto_ganancia)
    let valor_venta_formateado = formatearNumero("P", valor_venta)
    $("#tdMargenGanancia").html(margen_ganancia_formateado);
    $("#tdMontoGanancia").html(monto_ganancia_formateado);
    $("#tdValorVenta").html(valor_venta_formateado);
    $("#tdDescuento").html(descuento);
    $("#tdCreadoPor").html(creado_por);
    $("#tdFecha").html(fecha_reg);

}