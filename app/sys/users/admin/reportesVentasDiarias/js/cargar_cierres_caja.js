/* --------------------------------------------- FUNCION AJAX --------------------------------------- */
function obtenerCierresCajaAjax()
{
    return $.ajax({
        url: "read_cierre_caja.php",
        type: "GET",
        async: false
    }).responseText;
}

function obtenerCierresCajaFiltradaAjax(desde, hasta)
{
    return $.ajax({
        url: "read_cierre_caja_filtrada.php?desde="+desde+"&hasta="+hasta,
        type: "GET",
        async: false
    }).responseText;
}


/* --------------------------------------------- FUNCION DOM ---------------------------------------- */
function obtenerCierresCaja()
{
    //obtener fechas escritas
    let desde = $("#fechaDesde").val();
    let hasta = $("#fechaHasta").val();

    //validar formato de fechas
    let fechaDesde = false;
    let fechaHasta = false;
    if(desde!=""||hasta!="")
    {
        fechaDesde = moment(desde, 'YYYY-MM-DD', true).isValid();
        fechaHasta = moment(hasta, 'YYYY-MM-DD', true).isValid();
    }

    //-------------------------------- DESCARGA DE INFORMACIÓN
    let descarga;
    if(fechaDesde&&fechaHasta)
    {
        console.log("entra a con filtro");
        descarga = obtenerCierresCajaFiltradaAjax(desde, hasta);
    }
    else
    {
        console.log("entra a sin filtro");
        descarga = obtenerCierresCajaAjax();
    }

    let template = "";

    try
    {
        let json = JSON.parse(descarga);
        json.forEach(c=>{
        button1 = ``;
        button2 = ``;
        buttonEditar = ``;
        fecha_cierre = "";
        estado = "";
        if(c.estado=="C")
        {
            estado = "CERRADO";
            button1 = "<button type='button' class='btn btn-danger' style='margin: 2px' disabled=true id='btnCerrar'>Cerrar</button>";
            buttonEditar = `<button type='button' class='btn btn-primary' style='margin: 2px' disabled=true>Editar</button>`;
            if(c.valor_total==0)
            {
                button2 = "<button type='button' class='btn btn-success' style='margin: 2px' disabled=true id='btnVerDetalle'>Ir</button>";
            }
            else
            {
                button2 = "<button type='button' class='btn btn-success' id='btnCerrar' style='margin: 2px' >Ir</button>";
            }
            fecha_cierre = c.hasta;
        }
        else
        {
            estado="EN-CURSO";
            button1 = "<button type='button' style='margin: 2px' class='btn btn-danger' id='btnCerrar'>Cerrar</button>";
            button2 = "<button type='button' style='margin: 2px' class='btn btn-success' id='btnVerDetalle'>Ir</button>";
            buttonEditar = `<button type='button' style='margin: 2px' class='btn btn-primary' idCierre='${c.id}' nomCaja='${c.nombre}'>Editar</button>`;
            fecha_cierre = "-";
        }
        valor_formateado = formatearNumero("P",c.valor_total);
        template+=
            `<tr idCierre=`+c.id+` nomCaja="`+c.nombre+`" class='${estado}' nomCaja='${c.nombre}'>
                <td>${c.id}</td>
                <td>${c.nombre}</td>
                <td>${c.creado_por}</td>
                <td>${c.desde}</td>
                <td>${fecha_cierre}</td>
                <td>${estado}</td>
                <td>${valor_formateado}</td>
                <td>`+buttonEditar+button1+button2+`</td>
            </tr>`;
        });
    }
    catch(e)
    {
        console.error(e);
        template = "<tr><td colspan='11'>Sin resultados</td></tr>";
    }
    $("#bodyCierreCaja").html(template);
}
      