$(document).on("ready", function(e)
{
	cargarVentasCaja();
});

//se compara si está habilitado el conteo de stock mínimo dentro de la base de datos o no
let estadoStock = comprobarEstadoStockMinimo();
let cantidadBD = 0;

//regisrar producto
let id_venta = "";
let idUbic = "";
let idProd = "";
let cantProd = "";
let obs = "";
let descto = 0;

$("#cantProd").val(1);
$("#prod").select2();

//arreglo obtener ID
let array = new Array();

//obtener número de mesa
let nCaja = $("#nCaja").html();

//se verifica si la opcion seleccionada de la venta de productos es válida o no
function productoValido()
{
	let valor = $("#prod").val();
	if(valor=="N")
	{
		$("#venta").attr("disabled", true);
	}
	else
	{
		$("#venta").attr("disabled", false);
	}
}

$("#venta").on('click', function(e)
{
	let id_venta = $("#id_venta").text();
	let idProd = $("#prod").val();
	let cantProd = parseInt($("#cantProd").text());
	let idCaja = $("#nCaja").text();
	let nomCaja = $("#nomCaja").text();
	//capturar hora
	let hora = getHora();

	if(obs==''||obs==null)
	{
		obs = 'Sin obs.';
	}
	registrarVenta(id_venta, idProd, cantProd, idCaja, nomCaja, hora);
})



$("#pagarVenta").on("click", function(e)
{
	$("#modalMetodoPago").modal("show");
});


//aplicar descuento
$("#btnAplicarDescto").on("click", function(e)
{
	$("#modalDescuento").modal("show");
});


$("#btnAñadirCuenta").on("click", function(e)
{
	$("#modalAñadirCuenta").modal("show");
});

$("#btnAgregarCliente").on("click", function(e)
{
	//entregar rut previamente escrito desde modalAñadirCuenta al modalAgregarCuenta
	let rutAñadir = $("#txtRut").val();
	$("#txtRutGuardar").val(rutAñadir);

	
	let valRut = fnValidarRut.validaRut(rutAñadir);

	lblRutValido(valRut);

	//mostrar modals
	$("#modalAgregarCliente").modal("show");
	$("#modalAñadirCuenta").modal("hide");
})

var ventaInd = 0;


//acciones impresion venta individual
let valorCuentaInd = 0;
// array para imprimir cuenta individual según IDs
let arrayCuentaIndividual = new Array();


//asignar valor a Check en caso de que se marque o desmarque un checkbox
let check = 0;
function checkSeleccionado(checkbox)
{
	if(checkbox.checked)
	{
		check++;
	}
	else
	{
		check--;
	}
}
