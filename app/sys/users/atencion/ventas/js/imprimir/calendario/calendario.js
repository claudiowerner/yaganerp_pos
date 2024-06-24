//funcion de descarga de datos del calendario
function descargarCalendario(año, mes)
{
    let datos = {
        "año": año,
        "mes": mes
    }
    return $.ajax({
        url: "func_php/imprimir/calendario/calendario.php",
        data: datos,
        type: "POST",
        async: false
    }).responseText;
}

//renderizar calendario
function renderizarCalendario(año, mes, dias)
{
    let descarga = descargarCalendario(año, mes);
    let json = JSON.parse(descarga)
    let dia_semana;
    let template = `<tr>`;
    json.forEach(j=>{  

        if(j.dia.match(/Mon/)&&j.fecha==1)
        {
            template+=
            `<td id='${j.dia} ${j.fecha}-${mes}-${año}'></td>`;
            dia_semana = 1;
            template = template + semana(template, dia_semana, j.n_dias, mes, año)  
        }
        if(j.dia.match(/Mon/)&&j.fecha==1)
        {
            template+=
            `<td id='${j.dia} ${j.fecha}-${mes}-${año}'></td>`;
            dia_semana = 2;
            template = template + semana(template, dia_semana, j.n_dias, mes, año)
        }
        if(j.dia.match(/Wed/)&&j.fecha==1)
        {
            template+=
            `   <td id=''></td>
                <td id='${j.dia} ${j.fecha}-${mes}-${año}'></td>`;
            dia_semana = 3;
            template = template + semana(template, dia_semana, j.n_dias, mes, año)
        }
        if(j.dia.match(/Thu/)&&j.fecha==1)
        {
            template+=
                `<td id=''></td>
                <td id=''></td>
                <td id='${j.dia} ${j.fecha}-${mes}-${año}'></td>`;
            dia_semana = 4;
            template = template + semana(template, dia_semana, j.n_dias, mes, año)
        }
        if(j.dia.match(/Fri/)&&j.fecha==1)
        {
            template+=
                `<td id=''></td>
                <td id=''></td>
                <td id=''></td>
                <td id='${j.dia} ${j.fecha}-${mes}-${año}'></td>`;
            dia_semana = 5;
            template = template + semana(template, dia_semana, j.n_dias, mes, año)
        }
        if(j.dia.match(/Sat/)&&j.fecha==1)
        {
            template+=
            `
                <td id=''></td>
                <td id=''></td>
                <td id=''></td>
                <td id=''></td>
                <td id=''></td>`;
                dia_semana = 6;
                template = template + semana(template, dia_semana, j.n_dias, mes, año)
            }
        
        if(j.dia.match(/Sun/)&&j.fecha==1)
                {
                    template+=
                    `
                        <td id=''></td>
                        <td id=''></td>
                        <td id=''></td>
                        <td id=''></td>
                        <td id=''></td>
                        <td id='${j.dia} ${j.fecha}-${mes}-${año}'></td>`;
                        dia_semana = 7;
                        template = template + semana(template, dia_semana, j.n_dias, mes, año)
                }
        
        template += "</tr>";
    });

    $("#calendario").html(template);

}
//se rellena la semana
function semana(template, dia_semana, dia_mes,  mes, año)
{
    alert(año)
    let isFinalMes = false;
    let fecha = 0;
    while(dia_semana<=8)
    {
        fecha++
        dia_mes--;
        template += 
        `<td >
            <button id='${año}-${mes}-${(fecha)}' class='btn btn-primary' disabled>
                <h3>${(fecha)}</h3>
            </button>
        </td>`;
        if(dia_semana==7)
        {
            template += "</tr><tr>"
            dia_semana=0;
        }
        if(dia_mes==0)
        {
            isFinalMes=true;
            dia_semana=8;
        }
        dia_semana++;
    }
    return template;
}