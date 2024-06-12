<?php

session_start();



  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  $piso = 1;

  $estado = "";

  require_once '../../../../conexion.php';

	//query
	$consulta = "SELECT p.nombre FROM planes p JOIN cliente c ON c.plan_comprado = p.id WHERE c.id = $id_cl";
  $resultado = $conexion->query($consulta);
  while ($row = $resultado->fetch_array()) 
  {
    echo $nombre = $row["nombre"];
  };

  echo $estado;
?>
