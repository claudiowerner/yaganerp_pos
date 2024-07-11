<?php

session_start();

if(isset($_SESSION['user'])){
  


  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  $categoria = $_POST["categoria"];
  


  require_once '../../../../conexion.php';
  
	//query
	$sql = "SELECT * FROM productos 
  WHERE id_cl = $id_cl 
  AND categoria = $categoria";
  $res = $conexion->query($sql);

  echo $res->num_rows;
  
}

?>
