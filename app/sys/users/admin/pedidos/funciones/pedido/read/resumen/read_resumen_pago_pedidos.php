<?php

session_start();


  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  
  
  $id_pedido = $_POST["id_pedido"];


	require_once '../../../../../../../conexion.php';

	//query
	  $sql = 
  "SELECT SUM(pd.valor*pd.cantidad) AS valor_pagado FROM pedidos p
  JOIN pedidos_detalle pd 
  ON p.id = pd.id_pedido
  WHERE p.id_cl = $id_cl
  AND p.estado_pago = 'C'
  AND p.estado = 'C'";
  $resultado = $conexion->query($sql);
  $json = array();
  if ($resultado->num_rows > 0)
  {
    while ($row = $resultado->fetch_array())
    {
      $json[] =array(
        'id_proveedor' => $row['id_proveedor'],
        'id' => $row['id'],
        'producto' => $row['producto'],
        'cantidad' => $row['cantidad'],
        'valor' => $row['valor']
      );
    }
  echo json_encode($json);
 }

?>
