//cargar el tipo de unidad de medida para la opción de agregar/editar producto
function descargarUnidades()
{
    return $.ajax(
        {
          url:"funciones/read_unidades_medida.php",
          type: "POST",
          async: false
        }
    ).responseText;
}


function cargarUnidad()
{
    let descarga = descargarUnidades();
    let json = JSON.parse(descarga);

    template = "<option>---SELECCIONE---</option>";
    json.forEach(j=>{
        template += `<option value='${j.id}'>${j.nombre_medida}</option>`;
    })
    $("#slctUnidad").html(template);
    $("#slctUnidadEditar").html(template);
}

cargarUnidad();
