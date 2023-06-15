<?php

session_start();



  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  $piso = 1;

  $estado = "";

  require_once '../../../../conexion.php';

	//query
	$consulta = "SELECT estado FROM autorizacion WHERE id_cl = $id_cl;";
  $resultado = $conexion->query($consulta);
  while ($row = $resultado->fetch_array()) 
  {
    $estado = $row["estado"];
  };

  echo $estado;
?>
