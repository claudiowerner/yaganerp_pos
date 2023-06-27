//agregar producto al pistolear código de barra
$("#txtCodBarra").on("keyup", function(enter)
{
  if(enter.keyCode==13)
  {
    codigo = $("#txtCodBarra").val();
    $.ajax(
        {
            url: "func_php/comprobar_existencia_producto_cod_barra.php",
            data: {"cod_barra":codigo},
            type: "POST",
            success: function(e)
            {
                if(e!=0)
                {
                    let id_venta = $("#id_venta").text();
                    let idProd = e;
                    let cantProd = $("#cantProd").text();
                    let idCaja = $("#nCaja").text();
                    let nomCaja = $("#nomCaja").text();
                    //capturar hora
                    let hora = getHora();
                    registrarVenta(id_venta, idProd, cantProd, idCaja, nomCaja, hora)
                }
                else
                {
                    swal({
                        title: "Aviso",
                        text: "No se encuentra ningún producto con código '"+codigo+"'",
                        icon:"warning"
                    })
                }
            }
        }
    )
    .fail(function(e)
    {
        swal({
            title:"Error",
            text:e.responseText,
            icon:"error"
        })
    })
    $("#txtCodBarra").val("");
    $("#txtCodBarra").trigger("focus");
  }
})