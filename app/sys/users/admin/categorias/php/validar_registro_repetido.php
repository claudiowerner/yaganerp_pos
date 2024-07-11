<?php

session_start();

if(isset($_SESSION['user'])){
  


  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  $nombre = $_POST["nombre"];
  


  require_once '../../../../conexion.php';
  
	//query
	$sql = "SELECT * FROM categorias 
  WHERE id_cl = $id_cl 
  AND nombre_cat = '$nombre'";
  $res = $conexion->query($sql);

  echo $res->num_rows;
  
}

?>
