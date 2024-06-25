function imprimirBoleta(script_php, idVenta)
{
    id_venta = $("#id_venta").text();
    nCaja = $("#nCaja").text();
    fecha = getFechaBD();
    hora = getHora();
    formaPago = $("#metodoPagoGral").val();
    neto = $("#valorNeto").text();
    fecha = getFechaBD() + getHora();
    porcDescto = 0;
    
    if(isNaN(parseInt($("#descuento").text())))
    {
        porcDescto = 0;
    }
    else
    {
        porcDescto = parseInt($("#descuento").text())
    }

    valDescto = parseInt($("#totalDescuento").text());
    iva = parseInt($("#iva").text());
    subtotal = parseInt($("#subtotal").text());
    total = parseInt($("#totalVenta"));

    window.open(`ticket_pdf/ticket.php?id_venta=${id_venta}&reimpresion=0`, "_blank");
    window.focus();
}