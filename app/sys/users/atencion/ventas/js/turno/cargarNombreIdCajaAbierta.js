function cargarNombreIdCaja()
{
    return $.ajax(
        {
            url:"func_php/turno/cargarNombreIdCaja.php",
            type: "POST",
            async: false
        }
    ).responseText;
}

let descargaIdCaja = cargarNombreIdCaja();
//JIC= json id caja
let jic = JSON.parse(descargaIdCaja);

$("#nombreCaja").html(jic.nombre);
$("#id_caja").html(jic.id);