<?php

session_start();



  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  


  require_once '../../../../../conexion.php';

	//query
	$sql = 
  "SELECT porcentaje FROM margen_ganancia WHERE id_cl = $id_cl";
  $resultado = $conexion->query($sql);;
  $mostrar = "";
  while($row = $resultado->fetch_array())
  {
    $mostrar = $row["porcentaje"];
  }

  if($mostrar==null||$mostrar==""||$mostrar==0)
  {
    echo 0.3;
  }
  else
  {
    echo $mostrar;  
  }

?>
