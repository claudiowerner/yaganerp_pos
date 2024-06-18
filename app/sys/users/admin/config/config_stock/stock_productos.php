<?php

  session_start();


  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  $piso = 1;

  $estado = $_POST["estado"];
  $stock_min = $_POST["stock_min"];

  require_once '../../../../conexion.php';

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
    echo "Cambios guardados exitosamente";
  }
  else
  {
    die("Error al modificar clave: ". mysqli_error($conexion));
  }

?>
