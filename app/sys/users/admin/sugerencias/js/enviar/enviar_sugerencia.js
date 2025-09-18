$("#btnEnviarSugerencia").on("click", function(e)
{
    swal({
        title: "¿Seguro?",
        text: `¿Desea enviar su sugerencia?`,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((enviar) => {
        if (enviar)
        {
            enviar_sugerencia();
            enviar_mail_sugerencia_admin();
            enviar_copia_mail_sugerencia_admin();
        } 
    });
})