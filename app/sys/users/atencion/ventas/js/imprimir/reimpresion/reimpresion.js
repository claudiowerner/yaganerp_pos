//funcion de reimprimir boleta

function reimprimirBoleta(correlativo)
{
    window.open(`ticket_pdf/ticket.php?id_venta=${correlativo}&reimpresion=1`, "_blank");
}