function declinar_solicitud(id)
{
    swal({
        title: "¿Está seguro?",
        text: `¿Desea declinar la solicitud #${id}?`,
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((pagar) => {
        if (pagar)
        { 
            $.ajax({
                url: "script_php/editar/declinar_solicitud.php",
                data: {"id": id},
                type: "POST",
                success: function(e)
                {
                    let j = JSON.parse(e);
                    msjes_swal(j.titulo, j.mensaje, j.icono);
                    leer_solicitudes();
                }
            })
        }
      });
}
