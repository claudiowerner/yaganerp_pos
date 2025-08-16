<?php

  session_start();
  


  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];


	require_once '../../../../../../../conexion.php';
  require_once "../../../../../../../php/mb_encoding.php";


  $id_pedido = $_POST["id_pedido"];

	//query
	$sql = 
  "SELECT nombre_pedido 
  FROM pedidos
  WHERE id_cl = $id_cl
  AND id = '$id_pedido'";
  $resultado = $conexion->query($sql);
  if ($resultado->num_rows > 0){
    while ($row = $resultado->fetch_array())
    {
      echo mb_encoding($row["nombre_pedido"]);
    }
  }

?>
