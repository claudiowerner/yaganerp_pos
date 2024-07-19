<?php

  session_start();


  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  
  $porcentaje = $_POST["porcentaje"];

  require_once '../../../../../conexion.php';

  //query
  $sql = "SELECT * FROM margen_ganancia WHERE id_cl = '$id_cl'";
  $resultado = $conexion->query($sql);

  if($resultado -> num_rows<=0)
  {
    $sql = "INSERT INTO `webpos`.`margen_ganancia` (`id`, `id_cl`, `porcentaje`) VALUES (null, '$id_cl', $porcentaje);";
  }
  else
  {
    $sql = "UPDATE margen_ganancia SET porcentaje = $porcentaje WHERE id_cl = '$id_cl';";
  }
  $resultado = $conexion->query($sql);
  if($resultado)
  {
    $json = array(
      "margen" => true,
      "titulo" => "Excelente",
      "mensaje" => "Margen de ganancia editado correctamente.",
      "icono" => "success"
    );
  }
  else
  {
    $json = array(
      "margen" => false,
      "titulo" => "Error",
      "mensaje" => "Ha ocurrido un error al editar el margen de ganancia: ".$conexion->error,
      "icono" => "error"
    );
  }

  echo json_encode($json);

?>
