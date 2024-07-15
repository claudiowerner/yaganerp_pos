function filtrarInformacion()
{
    //Definición de variables que contienen las fechas de inicio y fin
    let fecha_inicio = $("#fecha_inicio").val();
    let fecha_fin = $("#fecha_fin").val();

    if(fecha_inicio=="")
    {
        fecha_inicio = getFecha();
    }
    if(fecha_fin=="")
    {
        fecha_fin = getFecha();
    }

    //validar si el formato de las fechas corresponde o no
    let fecha_inicio_valida = moment(fecha_inicio, 'YYYY-MM-DD', true).isValid();
    let fecha_fin_valida = moment(fecha_fin, 'YYYY-MM-DD', true).isValid();
    
    if(fecha_inicio_valida&&fecha_fin_valida)
    {
        //Validar que el año de inicio sea mayor al primer año de venta registrado en la plataforma
        let año_inicio = fecha_inicio.split("-");
        año_inicio = año_inicio[0];


        //Validar que el año de inicio sea mayor al primer año de venta registrado en la plataforma
        let año_fin = fecha_fin.split("-");
        año_fin = año_fin[0];


        //Validar que el año de inicio sea + a 2000
        if(año_inicio>2000&&año_fin>2000)
        {
            //descargar primer año de venta
            let descargaPrimerAñoVenta = obtenerPrimerAñoVenta()
            let json = JSON.parse(descargaPrimerAñoVenta);
            
            //validar que el año de inicio sea mayor o igual al año inicial de ventas
            if(año_inicio<json.año_inicial)
            {
                msjes_swal("Aviso", "El año de inicio indicado ("+año_inicio+") es menor al año inicial de ventas registrado en el sistema ("+json.año_inicial+")", "warning");
            }
            else
            {
                //validar que la fecha final sea mayor o igual a la fecha de inicio
                let inicio = Date.parse(fecha_inicio);
                let fin = Date.parse(fecha_fin);
                if(inicio>fin)
                {
                    msjes_swal("Aviso", "La fecha de inicio debe ser menor a la fecha final", "warning");
                    imprimirGraficos(fecha_inicio, fecha_fin)
                }
                else
                {
                    imprimirGraficos(fecha_inicio, fecha_fin)
                }
            }
        }

    }
    else
    {
        //se imprime la información sin filtro de fechas
        imprimirGraficos(fecha_inicio, fecha_fin)
    }
}

function imprimirGraficos(fecha_inicio, fecha_fin)
{
    graficoTartaCategorias(fecha_inicio, fecha_fin);
    graficoTartaProductos(fecha_inicio, fecha_fin);
    graficoBarraCategorias(fecha_inicio, fecha_fin);
    graficoBarraProductos(fecha_inicio, fecha_fin);
}