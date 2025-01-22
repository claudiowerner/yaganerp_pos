/* ------------------------------------------------ FUNCION AJAX --------------------------------------------------- */
function editarEstadoPromocionesAjax(estado)
{
    $.ajax({
        url: "script_php/promociones/editar_estado_promocion.php",
        data: {"estado": estado},
        type: "POST", 
        success: function(e)
        {
            let j = JSON.parse(e);
            msjes_swal(j.titulo, j.mensaje, j.icono);
        }
    })
}


/* ----------------------------------------------- FUNCION DOM ------------------------------------------------------ */
$("#swPromociones").change(function(){
    let estado = "";
    if(this.checked)
    {
        estado = "S"
    }
    else
    {
        estado = "N"
    }

    editarEstadoPromocionesAjax(estado);
})