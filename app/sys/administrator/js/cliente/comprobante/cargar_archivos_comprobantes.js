
/* ------------------------------------------- FUNCION AJAX -------------------------------------------- */
function cargarArchivosComprobantesAjax(idCliente)
{
    return $.ajax({
        url: "php/cliente/comprobante/read_comprobantes_tabla.php",
        type: "POST",
        data: {"id_cl": idCliente},
        async: false
    }).responseText;
}


/* ------------------------------------------- FUNCION DOM --------------------------------------------- */
function cargarArchivosComprobantes(idCliente)
{
    let descarga = cargarArchivosComprobantesAjax(idCliente)
    let json = JSON.parse(descarga);
    let template = "";
    if(json.resultados!=0)
    {
        json.forEach(j=>{
            template = template+
            `<tr>
                <td>${j.nro_fila}</td>
                <td style="cursor:pointer;" onclick="abrirComprobantePago('${j.id}','${j.dir_archivo}')">${j.nombre_archivo}</td>
                <td>${j.fecha_carga}</td>
            </tr>`;
        });
    }
    else
    {
        template = "<tr><td colspan=3>"+json.mensaje+"</td></tr>"
    }
    $("#bodyComprobantes").html(template);
}