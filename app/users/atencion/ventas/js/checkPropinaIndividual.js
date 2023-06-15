prop = 0;
let cadena = "";
let cadena2 = "";

$(document).on('click', "#checkPropina", function(e)
{
    var tr = e.target.closest("tr");
    cadena = tr.cells[8].innerText;
    cadena3 = tr.cells[9].innerText;
    cadena3 = eliminarCaracter(cadena3);
    item = tr.cells[0].innerText;

    propina = $(this).attr("propina");
    id_venta = $(this).attr("id_venta");

    propinaCuentaGeneral = $("#propinaCuentaGeneral").text();
    tvPropina = $("#totalVentaGeneral").text();
    totalVenta = 0;
    
    if(e.target.checked)
    {
        $("input[id=checkPropinaCuentaGeneralParcial]").prop("checked", true);
    
        valorNeto = $("#valorNeto").text();
        cadena2 = eliminarCaracter(cadena);
        
        //sumas de propina de productos
        prop = parseInt(propinaCuentaGeneral) + parseInt(cadena2);


        //calcular suma total entre valor neto + propina según el ítem seleccionado
        subtotal = parseInt(cadena3) + parseInt(cadena2);

        //calcular suma total entre total neto + propina
        totalVenta = parseInt(valorNeto) + parseInt(prop);

        $("#propinaCuentaGeneral").html(prop);
        $("#totalVentaGeneral").html(totalVenta);
        $("#total"+item).html(subtotal);

        $.ajax({
            url: "func_php/propina_venta_sumar.php?id_venta="+id_venta+"&propina="+propina,
            type: "GET",
            success: function(e)
            {
                console.log(e);
            }
        })
        .fail(function(e)
        {
            console.log("Error: "+e.responseText);
        })

    }
    else
    {
        valorNeto = $("#totalVentaGeneral").text();
        cadena2 = eliminarCaracter(cadena);

        prop = parseInt(propinaCuentaGeneral) - parseInt(cadena2);

        //calcular suma total entre total neto + propina
        totalVenta = parseInt(valorNeto) - parseInt(cadena2);
        
        //calcular suma total entre valor neto + propina según el ítem seleccionado
        subtotal = parseInt(cadena3) - parseInt(cadena2);
        $("#propinaCuentaGeneral").html(prop);
        $("#totalVentaGeneral").html(totalVenta); 
        $("#total"+item).html(subtotal);

        $.ajax({
            url: "func_php/propina_venta_restar.php?id_venta="+id_venta+"&propina="+propina,
            type: "GET",
            success: function(e)
            {
                console.log(e);
            }
        })
        .fail(function(e)
        {
            console.log("Error: "+e.responseText);
        })
    }
    cadena = "";
    totalVenta = 0;
})

//eliminar $ de cadena de strings
function eliminarCaracter(cadena)
{
    return cadena.slice(1);
}