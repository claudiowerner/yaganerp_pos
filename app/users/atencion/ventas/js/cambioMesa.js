tipoVenta = $("#tv").text();
$(document).on('click', '.mOcupada', function()
{
  swal(
    {
      title: "Aviso",
      text: "Esta mesa figura como ocupada",
      icon: "warning"
    }
  )
});

$(document).on('click', '.mDesocupada', function()
{
  let nMesaNueva = $(this).attr('id');
  let ubic = $(this).attr('ubic');
  let hora = getHora();
  let id = $(this).attr("id");
  let nom_mesa = $(this).attr("nom_mesa");

  swal({
        title: "¿Está seguro?",
        text: "¿Confirma cambio de esta mesa a la mesa "+nMesaNueva+"?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((pagar) => {
        if (pagar)
        {
            let nMesaActual = $("#nMesa").text(); //
            let id_venta = $("#id_venta").text();//envío de correlativo;
            $.ajax({
                url: "func_php/cambio_mesa_exe.php?nMesaNueva="+nMesaNueva+"&nMesaActual="+nMesaActual+"&corr="+id_venta+"&hora="+hora+"&ubic="+ubic, 
                type: "GET",
                success: function(e)
                {
                    $("#nMesa").html(nMesaNueva);
                    location.href = "../ventas/index.php?id="+id+"&nomMesa="+nom_mesa+"&tipoVenta=&idMesa="+id+"&idUbic="+ubic;
                }
            })
            .fail(function(e)
            {
              console.log("Error cambio de mesa: "+e.responseText);
            })
        } 
        else 
        {
          swal("Operación cancelada");
        }
    });

});