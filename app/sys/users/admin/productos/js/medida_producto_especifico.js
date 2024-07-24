/* ------------------------------------------ FUNCION AJAX --------------------------------------- */

function cargarUnidadEspecificaBD(id)
{
    return $.ajax({
        url:"funciones/read_unidad_medida_prod_especifico.php",
        data: {"id_prod": id},
        type: "POST",
        async: false
    }).responseText;
}


/* ---------------------------------------- FUNCIONES DEL DOM---------------------------------------- */
function cargarUnidadEspecifica(id)
{
    let descarga = cargarUnidadEspecificaBD(id);
        let json = JSON.parse(descarga);
            json.forEach(e=>{
                if(e.pesaje=="N")
                {
                rpEditar = "N";
                $("#swPesajeEditar").attr("checked", false);
                $("#pesajeEditar").hide();
                $("#codBarraEditar").attr("required", true);
                $("#codBarraEditar").attr("placeholder", "");
                }
                else
                {
                rpEditar = "S";
                    $("#swPesajeEditar").attr("checked", true)
                    $("#pesajeEditar").show();
                    $("#codBarraEditar").attr("required", false);
                    $("#codBarraEditar").attr("placeholder", "");
                }
                $("#slctUnidadEditar").val(e.id);
            })
        
}