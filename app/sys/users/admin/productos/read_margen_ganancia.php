<?php

session_start();



  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  $piso = 1;


  require_once '../../../conexion.php';

	//query
	$consulta = 
  "SELECT porcentaje FROM margen_ganancia WHERE id_cl = $id_cl";
  $resultado = $conexion->query($consulta);
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
