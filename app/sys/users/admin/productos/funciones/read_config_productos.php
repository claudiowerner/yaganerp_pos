<?php

session_start();

if(isset($_SESSION['user'])){
  $tipo = $_SESSION['user']['tipo_usuario'];
 if($tipo == 3){
   header('Location: ../');
 }
 }else{
 header('Location: ../');
 }


  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  


  require_once '../../../../../conexion.php';

	//query
	$sql = "SELECT estado, stock_minimo FROM stock_minimo_producto WHERE id_cl = $id_cl;";
  $resultado = $conexion->query($sql);;
  if ($resultado->num_rows > 0){
    $json = array();
    while ($row = $resultado->fetch_array())
    {
      echo $row["estado"];
    };
  }

?>
