$(document).on('click', ".general", function(e)
{
    let table = document.getElementById("tblPagoGral");
    let id = $(this).attr('id');
    let propina = 0;
    let subtotal = 0;
    let totalNeto = 0;
    let totalVentaGeneral = 0;


    //conversión de tabla a array
    var tabla = [];
    var id_venta = [];

    $("table#tblPagoGral tr").each(function(e) {
        var arregloTabla = [];
        var datosTabla = $(this).find("#propina");

        var arregloIdVenta = [];
        var datosIdVenta = ($(this).find("#id_venta_num"));

        if (datosTabla.length > 0) {
            datosTabla.each(function()
            {
                arregloTabla.push($(this).text()); 
            });
            tabla.push(arregloTabla);
        }
        
        if (datosIdVenta.length > 0) {
            datosIdVenta.each(function()
            {
                int = parseInt($(this).text());
                arregloIdVenta.push(int); 
            });
            id_venta.push(arregloIdVenta);
        }
    });

    if(e.target.checked)
    {
        if(id=="checkPropinaCuentaGeneral")
        {
            $("input[id=checkPropinaCuentaGeneralParcial]").prop("checked", false);
            $("input[id=checkPropina]").prop("checked", true);
            $("input[id=checkPropina]").prop("disabled", true);


            for (var r = 0; r < (table.rows.length-1); r++) 
            {
                //se compara si lo registrado en x celda figura como undefined o no
                if(tabla[r]!=null)
                {
                    console.log("id_venta: "+id_venta[r]);
                    subtotal = parseInt($("#total"+(r+1)).text()) + parseInt(tabla[r]);
                    propina = parseInt(propina) + parseInt(tabla[r]);
                    $("#total"+(r+1)).html(subtotal);
                    
                    //conexion ajax para sumar propina
                    $.ajax({
                        url: "func_php/propina_venta_sumar.php?id_venta="+id_venta[r]+"&propina="+tabla[r],
                        type: "GET",
                        async: false,
                        success: function(e)
                        {
                            console.log("Success ajax: "+e);
                        }
                    })
                    .fail(function(e)
                    {
                        console.log("Error calculo propina total (agregar propina): "+e.responseText);
                    })
                } 
            }
            $("#propinaCuentaGeneral").html(propina);
            ////////////////////////////////////////////////////////////////////////////////////////
        }
        if(id=="checkPropinaCuentaGeneralParcial")
        {
            for (var r = 0; r < (table.rows.length-1); r++) 
            {
                //se compara si lo registrado en x celda figura como undefined o no
                if(tabla[r]!=null)
                {
                    a = $("#valor"+(r+1)).text();
                    b = $("#total"+(r+1)).text();
                    if(a!=b)
                    {
                        subtotal = parseInt($("#total"+(r+1)).text()) - parseInt(tabla[r]);
                        propina = parseInt(propina) - parseInt(tabla[r]);
                        $("#total"+(r+1)).html(subtotal);

                    }
                } 
            } 
            $("input[id=checkPropinaCuentaGeneral]").prop("checked", false);
            $("input[id=checkPropina]").prop("checked", false);
            $("input[id=checkPropina]").prop("disabled", false);

            propina = $("#propinaCuentaGeneral").text();
            totalNeto = $("#totalVentaGeneral").text();
            totalVentaGeneral = parseInt(totalNeto) - parseInt(propina);
            $("#totalVentaGeneral").html(totalVentaGeneral);
            
            $("#propinaCuentaGeneral").html("0");
        }
    }
    else
    {
        if(!$("#checkPropinaCuentaGeneral").prop("checked"))
        {
            for (var r = 0; r < (table.rows.length-1); r++) 
            {
                //se compara si lo registrado en x celda figura como undefined o no
                if(tabla[r]!=null)
                {
                    a = $("#valor"+(r+1)).text();
                    b = $("#total"+(r+1)).text();
                    if(a!=b)
                    {
                        subtotal = parseInt($("#total"+(r+1)).text()) - parseInt(tabla[r]);
                        propina = parseInt(propina) - parseInt(tabla[r]);
                        $("#total"+(r+1)).html(subtotal);

                        $.ajax({
                            url: "func_php/propina_venta_restar.php?id_venta="+id_venta[r]+"&propina="+tabla[r],
                            type: "GET",
                            async: false,
                            success: function(e)
                            {
                                console.log("Success ajax: "+e);
                            }
                        })
                        .fail(function(e)
                        {
                            console.log("Error calculo propina total (restar propina): "+e.responseText);
                        })
                    }
                } 
            }
            $("input[id=checkPropinaCuentaGeneral]").prop("checked", false);
            $("input[id=checkPropina]").prop("checked", false);
            $("input[id=checkPropina]").prop("disabled", false); 

            propina = $("#propinaCuentaGeneral").text();
            totalNeto = $("#totalVentaGeneral").text();
            totalVentaGeneral = parseInt(totalNeto) - parseInt(propina);
            $("#totalVentaGeneral").html(totalVentaGeneral);
            
            $("#propinaCuentaGeneral").html("0");
        }
    }
});