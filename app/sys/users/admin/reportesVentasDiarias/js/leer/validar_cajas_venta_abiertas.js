function validarCajasDeVentaAbierta()
{
  return $.ajax(
    {
      url: "php/leer/validar_caja_abierta.php",
      type: "POST",
      async: false,
    }
  ).responseText;
}