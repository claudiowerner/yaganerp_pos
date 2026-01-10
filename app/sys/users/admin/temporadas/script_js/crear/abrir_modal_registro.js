function abrir_modal_registro()
{
    $("#modalRegistro").modal("show");
}

$("#btnAgregarTemporada").click(function(e)
{
    //VALIDAR EXISTENCIA TEMPORADAS ACTIVAS
    $.ajax({
        url: "script_php/leer/leer_temporadas_activas.php",
        type: "POST",
        success: function(e)
        {
            let j = JSON.parse(e);
            if(j.resultados!=0)
            {
                msjes_swal("Aviso", "Existe una temporada sin cerrar.", "warning");
            }
            else
            {
                abrir_modal_registro();   
            }
        }
    })
})