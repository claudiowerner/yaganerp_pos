/* -------------------------------------------- FUNCIONES AJAX ----------------------------------------*/
function crearMargenGananciaAjax(porcentaje)
{
    return $.ajax({
        url: "script_php/config_margen_ganancia/ingresar_margen.php",
        data: {"porcentaje":porcentaje},
        type: "POST",
        async: false
    }).responseText;
}

/* ------------------------------------------- FUNCIONES DOM ------------------------------------------- */
$("#btnGuardarCambiosMargen").on("click", function(e)
{
    let porcentaje = parseFloat($("#txtMargenGanancia").val());
    let p = porcentaje/100;

    let respuesta = crearMargenGananciaAjax(p);
    let json = JSON.parse(respuesta);

    msjes_swal(json.titulo, json.mensaje, json.icono);
    if(json.margen)
    {
        $("#modalConfGanancia").modal("hide");
    }
    
})


