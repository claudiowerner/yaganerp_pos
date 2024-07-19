<?php

  session_start();


  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  

  $estado = $_POST["estado"];
  $stock_min = $_POST["stock_min"];

  require_once '../../../../../conexion.php';

  //query
  $sql = "SELECT * FROM stock_minimo_producto WHERE id_cl = '$id_cl'";
  $resultado = $conexion->query($sql);

  if($resultado -> num_rows<=0)
  {
    $sql = "INSERT INTO stock_minimo_producto VALUES (null, '$id_cl', 'S', '3');";
  }
  else
  {
    $sql = "UPDATE stock_minimo_producto SET `estado` = '$estado', stock_minimo = '$stock_min' WHERE id_cl = '$id_cl';
    ";
  }
  $resultado = $conexion->query($sql);
  if($resultado)
  {
    $json = array(
      "edicion_stock" => true,
      "titulo" => "Excelente",
      "mensaje" => "Configuración de stock mínimo modificada correctamente.",
      "icono" => "success"
    );
  }
  else
  {
    $json = array(
      "edicion_stock" => false,
      "titulo" => "Error",
      "mensaje" => "Ha ocurrido un error al editar la configuración de stock: ".$conexion->error,
      "icono" => "error"
    );
  }

  echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

?>
