let valorNeto = 0;
let margenGanancia = 0;
let precioTotal = 0;
let valorTotal = 0;

cargarPorcGanancia();

$("#valorNeto").on("keyup", function(e)
{
    valorNeto = parseFloat($("#valorNeto").val());
    margenGanancia = parseFloat($("#margenGanancia").val()/100);
    valorMargen = valorNeto*margenGanancia;
    valorTotal = parseInt(valorNeto) + parseInt(valorMargen);

    $("#montoGanancia").val(valorMargen);
    $("#valorVenta").val(valorTotal);
});

$("#margenGanancia").on("keyup", function(e)
{
    valorNeto = parseFloat($("#valorNeto").val());
    margenGanancia = parseFloat($("#margenGanancia").val()/100);
    valorMargen = valorNeto*margenGanancia;
    valorTotal = parseInt(valorNeto) + parseInt(valorMargen);

    $("#valorVenta").val(valorTotal);
});


$("#valorVenta").on("keyup", function(e)
{
    let valorNeto = parseFloat($("#valorNeto").val());
    let valorTotal = parseFloat($("#valorVenta").val());
    let margenGanancia = Math.round(((valorTotal*100)/valorNeto)-100);

    montoGanancia = parseInt(valorTotal) - parseInt(valorNeto);

    $("#montoGanancia").val(montoGanancia);
    $("#margenGanancia").val(margenGanancia);
});

$("#montoGanancia").on("keyup", function(e)
{
    let valorGanancia = $("#montoGanancia").val();
    let valorNeto = parseFloat($("#valorNeto").val());
    let valorTotal = parseFloat(valorGanancia)+parseFloat(valorNeto);
    let margenGanancia = Math.round(((valorTotal*100)/valorNeto)-100);

    montoGanancia = parseInt(valorTotal) - parseInt(valorNeto);

    $("#valorVenta").val(valorTotal);
    $("#margenGanancia").val(margenGanancia);
});







//editar valores de venta
$("#valorNetoEditar").on("keyup", function(e)
{
    valorNeto = parseFloat($("#valorNetoEditar").val());
    margenGanancia = parseFloat($("#margenGananciaEditar").val()/100);
    valorMargen = valorNeto*margenGanancia;
    valorTotal = parseInt(valorNeto) + parseInt(valorMargen);

    $("#montoGananciaEditar").val(valorMargen);
    $("#valorVentaEditar").val(valorTotal);
});

$("#margenGananciaEditar").on("keyup", function(e)
{
    valorNeto = parseFloat($("#valorNetoEditar").val());
    margenGanancia = parseFloat($("#margenGananciaEditar").val()/100);
    valorMargen = valorNeto*margenGanancia;
    valorTotal = parseInt(valorNeto) + parseInt(valorMargen);

    $("#valorVentaEditar").val(valorTotal);
});


$("#valorVentaEditar").on("keyup", function(e)
{
    let valorNeto = parseFloat($("#valorNetoEditar").val());
    let valorTotal = parseFloat($("#valorVentaEditar").val());
    let margenGanancia = Math.round(((valorTotal*100)/valorNeto)-100);

    montoGanancia = parseInt(valorTotal) - parseInt(valorNeto);

    $("#montoGananciaEditar").val(montoGanancia);
    $("#margenGananciaEditar").val(margenGanancia);
});

$("#montoGananciaEditar").on("keyup", function(e)
{
    let valorGanancia = $("#montoGananciaEditar").val();
    let valorNeto = parseFloat($("#valorNetoEditar").val());
    let valorTotal = parseFloat(valorGanancia)+parseFloat(valorNeto);
    let margenGanancia = Math.round(((valorTotal*100)/valorNeto)-100);

    montoGanancia = parseInt(valorTotal) - parseInt(valorNeto);

    $("#valorVentaEditar").val(valorTotal);
    $("#margenGananciaEditar").val(margenGanancia);
});





function cargarPorcGanancia()
{
    $.ajax(
        {
            url: "read_margen_ganancia.php",
            type: "POST",
            success: function(e)
            {
                resp = parseFloat(e)
                porcentaje = parseFloat(resp*100);
                $("#margenGanancia").val(porcentaje);
            }
        }
    );
}