
$("#btnCrearCajaNueva").on("click", function(e)
{
    $.ajax({
        url: "php/leer/validar_turno_abierto.php",
        type: "GET",
        success: function(e)
        {
            let validarClave = validarSolicitudClave();
            if(e==1)
            {
                msjes_swal("Aviso", "Ya existe una caja abierta", "warning");
            }
            else
            {
                if(validarClave.match("S"))
                {
                    $("#solicClaveAutAbrir").modal("show");
                }
                else
                {
                    $("#abrirCaja").modal("show");
                }
            }
        }
    });
})