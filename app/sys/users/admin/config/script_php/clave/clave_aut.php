<?php

session_start();


$id_us = $_SESSION['user']['id'];
$nombre = $_SESSION['user']["nombre"];
$id_cl = $_SESSION['user']["id_cl"];


$clave = $_POST['clave'];
$estado = $_POST['estado'];

require_once '../../../../../conexion.php';

	//query
$sql = "SELECT * FROM autorizacion WHERE id_cl = $id_cl";
$resultado = $conexion->query($sql);

$json = array();

if($resultado -> num_rows==0)
{
  $sql = "INSERT INTO autorizacion VALUES (null, '$id_cl', '$clave', 'S');";
  $resultado = $conexion->query($sql);


  if($resultado)
  {
    $json = array(
      "registro_clave" => true,
      "titulo" => "Excelente",
      "mensaje" => "Clave creada correctamente",
      "icono" => "success"
    );
  }
  else
  {
    $json = array(
      "registro_clave" => false,
      "titulo" => "Error",
      "mensaje" => "Ha ocurrido un error al registrar la clave de autorización: ".$conexion->error,
      "icono" => "error"
    );
  }
}
else
{
  $sql = "";
  if($clave=="")
  {
    $sql = "UPDATE autorizacion SET estado = '$estado' WHERE id_cl = '$id_cl';";
  }
  else
  {
    $sql = "UPDATE autorizacion SET clave = '$clave', estado = '$estado' WHERE id_cl = '$id_cl';";
  }
  $resultado = $conexion->query($sql);
  if($resultado)
  {
    $json = array(
      "edicion_clave" => true,
      "titulo" => "Excelente",
      "mensaje" => "Configuración de clave modificada exitosamente.",
      "icono" => "success"
    );
  }
  else
  {
    $json = array(
      "edicion_clave" => false,
      "titulo" => "Error",
      "mensaje" => "Ha ocurrido un error al editar la configuración de la clave de autorización: ".$conexion->error,
      "icono" => "error"
    );
  }

  echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
}

?>
