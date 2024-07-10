
let busqueda = "";

$("#btnAgregarCliente").on("click", function(e)
{
  $("#modalRegistro").modal("show");
});


$("#txtBusqueda").on("keyup", function(e)
{
  busqueda = $("#txtBusqueda").val()
  cargarDatosCliente(busqueda);
})

function verCuentas(rut)
{
  location.href = "cuentas/index.php?rut="+rut;
}

