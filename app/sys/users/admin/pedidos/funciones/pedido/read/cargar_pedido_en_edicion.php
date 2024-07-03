<?php

session_start();


  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];


	require_once '../../../../../../conexion.php';

	//query
	$sql = 
  "SELECT id 
  FROM pedidos 
  WHERE id_cl = $id_cl
  AND en_edicion = 'S'";
  $resultado = $conexion->query($sql);
  if ($resultado->num_rows > 0){
    while ($row = $resultado->fetch_array())
    {
      echo $row["id"];
    }
  }
  else
  {
    echo 0;
  }

?>
