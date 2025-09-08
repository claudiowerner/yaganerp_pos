//Funcion que carga los correlativos para mostrar las boletas
function cargarVentasPorDia(año, mes, fecha)
{

    //modals
    $("#modalDiaBoleta").modal("hide");
    $("#modalCorrelativo").modal("show");

    //descargar datos


    let datos = {
        "año": año,
        "mes": mes,
        "fecha": fecha
    }
    $.ajax({
        url: "func_php/imprimir/dia_boleta/correlativo_dia/correlativo.php",
        data: datos,
        type: "POST",
        success: function(e)
        {
            let json = JSON.parse(e);
            
            //rellenar tabla
            let template = ``;
            if(json.res>0)
            {
                json.forEach(j=>{
                    let valor_formateado = formatearNumero("V", j.valor);
                    template +=  
                    `<tr align='center'>
                        <td>${j.correlativo}</td>
                        <td>${valor_formateado}</td>
                        <td>${j.fecha_cierre}</td>
                        <td>
                            <button id='reimprimirBoleta' class='btn btn-primary' onClick=reimprimirBoleta('${j.correlativo}')>
                                <img src="img/impresora.png" width="15">
                            </button>
                        </td>
                    </tr>`;
                });
            }
            else
            {
                template = 
                `<tr>
                    <td colspan='4'>
                        Sin resultados
                    </td>
                </tr>`
            }
            $("#cuerpoCorrelativo").html(template);
        }
    })
}