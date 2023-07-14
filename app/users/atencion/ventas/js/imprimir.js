function imprimirBoleta()
{
    nCaja = $("#nCaja").text();
    idVenta = parseInt($("#id_venta").text());
    fecha = getFechaBD();
    hora = getHora();
    formaPago = $("#metodoPagoGral").val();
    neto = $("#valorNeto").text();
    folio = $("#id_venta").text();
    fecha = getFechaBD()+" "+getHora();

    datos = {
        "idVenta": idVenta
    }
      
    $.ajax(
        {
            url: "https://192.168.1.20/impresion_yaganerp/vendor/ticket.php",
            data: datos,
            cache: false,
            type: "POST",
            success: function(e)
            {
                swal(
                    {
                        title: "Excelente",
                        text: e,
                        icon: "success"
                    }
                )
            }
        }
        )
}