function imprimirBoleta(script_php, idVenta)
{
    alert(idVenta)
    nCaja = $("#nCaja").text();
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
            url: "https://webposerp.cl/impresion_yaganerp/vendor/"+script_php,
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