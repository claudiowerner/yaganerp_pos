$("#configMargenGanancia").on("click", function(e)
{
    $("#modalConfGanancia").modal("show");
});


$("#btnGuardarCambiosMargen").on("click", function(e)
{
    let porcentaje = parseFloat($("#txtMargenGanancia").val());
    let p = porcentaje/100;

    $.ajax(
        {
            url: "config_margen_ganancia/ingresar_margen.php",
            data: {"porcentaje":p},
            type: "POST",
            success: function(e)
            {
                alert(e)
            }
        }
    )
})

cargarMargenGanancia();

function cargarMargenGanancia()
{
    $.ajax(
        {
            url: "config_margen_ganancia/read_margen_ganancia.php",
            type: "POST",
            success: function(e)
            {
                resp = parseFloat(e)
                porcentaje = parseFloat(resp*100);
                $("#txtMargenGanancia").val(porcentaje);
            }
        }
    )
}


