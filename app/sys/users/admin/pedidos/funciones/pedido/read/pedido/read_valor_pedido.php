<?php

session_start();


  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  $id_pedido = $_POST["id_pedido"];


	require_once '../../../../../../../conexion.php';

	//query
	$sql = 
  "SELECT SUM(cantidad*valor) AS valor
  FROM pedidos_detalle 
  WHERE id_pedido = $id_pedido 
  AND id_cl = $id_cl
  AND estado = 'S'";
  $resultado = $conexion->query($sql);;
  if ($resultado->num_rows > 0){
    while ($row = $resultado->fetch_array())
    {
      echo $row["valor"];
    }
  }

?>
