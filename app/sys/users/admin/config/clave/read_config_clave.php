<?php

session_start();



  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  

  $estado = "";

  require_once '../../../../../conexion.php';

	//query
	$sql = "SELECT estado FROM autorizacion WHERE id_cl = $id_cl;";
  $resultado = $conexion->query($sql);;
  while ($row = $resultado->fetch_array()) 
  {
    $estado = $row["estado"];
  };

  echo $estado;
?>
