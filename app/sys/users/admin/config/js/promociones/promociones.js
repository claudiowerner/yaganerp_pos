/* ------------------------------------------------ FUNCION AJAX --------------------------------------------------- */
function cargarEstadoPromociones()
{
    $.ajax({
        url: "script_php/promociones/cargar_estado_promocion.php",
        type: "POST", 
        success: function(e)
        {
            let j = JSON.parse(e);
            $("#swPromociones").prop("checked", j.estado);
        }
    })
}

/* ------------------------------------------------ FUNCION DOM ----------------------------------------------------- */
$("#configPromociones").on("click", function(e)
{
    $("#modalConfPromociones").modal("show");
    cargarEstadoPromociones();
});
