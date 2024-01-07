<?php

session_start();


  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  
  
  $id_pedido = $_POST["id_pedido"];


  require_once '../../../../conexion.php';

	//query
	$consulta = 
  "SELECT prov.id AS id_proveedor, pd.id, pd.producto, pd.cantidad, pd.valor
  FROM proveedores prov
  JOIN pedidos ped
  ON ped.id_proveedor = prov.id
  JOIN pedidos_detalle pd
  ON ped.id = pd.id_pedido
  WHERE pd.id_cl = $id_cl
  AND pd.id_pedido = $id_pedido";
  $resultado = $conexion->query($consulta);
  if ($resultado->num_rows > 0){
  $json = array();
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
