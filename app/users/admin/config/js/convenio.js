//cargar estado de convenio (activado o desactivado)

$.ajax({
    url: "convenio/leer_datos_convenio.php",
    type: "POST",
    success: function(e)
    {
        if(e.match("N"))
        {
            $("#swConvenio").prop("checked", false);
        }
        else
        {
            $("#swConvenio").prop("checked", true);
        }
    }
})




ec = ""; //estado convenio

$("#swConvenio").on("click", function(e)
{
    if(e.target.checked)
    {
        ec = "S";
    }
    else
    {
        ec = "N";
    }
});

$("#btnGuardarConvenio").on("click", function(e)
{
    $.ajax({
        url: "convenio/actualizar_datos.php",
        data: {"estado":ec},
        type: "POST",
        success: function(e)
        {
            swal({
                title: "Excelente",
                text: e,
                icon: "success"
            });
            $("#modalConfConvenio").modal("hide");
        }
    })
})