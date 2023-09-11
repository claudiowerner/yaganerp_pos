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

    window.open(`ticket_pdf/ticket.php?nCaja=${nCaja}&id_venta=${id_venta}&fecha=${fecha}&hora=${hora}&descuento=${porcDescto}&valDescto=${valDescto}&iva=${iva}&subtotal=${subtotal}&total=${total}`, "_blank");
    window.focus();
}