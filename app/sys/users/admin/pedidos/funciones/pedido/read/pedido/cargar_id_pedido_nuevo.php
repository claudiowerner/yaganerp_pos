<?php

  session_start();
	date_default_timezone_set('America/Santiago');


  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];


	require_once '../../../../../../../conexion.php';

	//query
	$sql = 
  "SELECT COUNT(id) AS id FROM pedidos
  WHERE id_cl = $id_cl";
  $resultado = $conexion->query($sql);;
  if ($resultado->num_rows > 0){
    while ($row = $resultado->fetch_array())
    {
      echo $row["id"];
    }
  }

?>
