//Descargar correlativo
function descargarCorrelativo(año, mes, fecha)
{
    let datos = {
        "año": año,
        "mes": mes,
        "fecha": fecha
    }
    return $.ajax({
        url: "func_php/imprimir/dia_boleta/correlativo_dia/correlativo.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText;
}



//Funcion que carga los correlativos para mostrar las boletas
function cargarVentasPorDia(año, mes, fecha)
{

    //modals
    $("#modalDiaBoleta").modal("hide");
    $("#modalCorrelativo").modal("show");

    //descargar datos
    let descarga = descargarCorrelativo(año, mes, fecha);
    let json = JSON.parse(descarga);
    
    //rellenar tabla
    let template = ``;
    json.forEach(j=>{
        let valor_formateado = formatearNumero("V", j.valor);
        template +=  
        `<tr align='center'>
            <td>${j.correlativo}</td>
            <td>${valor_formateado}</td>
            <td>${j.fecha_cierre}</td>
            <td>
                <button id='reimprimirBoleta' class='btn btn-primary'>
                    <img src="img/impresora.png" width="15">
                </button>
            </td>
        </tr>`;
    });
    $("#cuerpoCorrelativo").html(template);
}