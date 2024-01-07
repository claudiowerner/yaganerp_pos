<?php

session_start();


  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  $piso = 1;


  require_once '../../../../conexion.php';

	//query
	$consulta = 
  "SELECT p.id, prov.nombre_proveedor, p.estado, u.nombre,
  DATE_FORMAT(p.fecha_registro, '%d-%m-%Y') AS fecha_registro,
  SUM(pdet.cantidad*pdet.valor) AS valor
  FROM pedidos p 
  JOIN proveedores prov 
  ON prov.id = p.id_proveedor
  JOIN pedidos_detalle pdet 
  ON p.id = pdet.id_pedido
  JOIN usuarios u 
  ON u.id = p.creado_por
  WHERE p.id_cl = $id_cl  
  GROUP BY id;;";
  $resultado = $conexion->query($consulta);
  if ($resultado->num_rows > 0){
  $json = array();
  while ($row = $resultado->fetch_array())
  {
    $estado = "";
    if($row['estado']=="C")
    {
      $estado = "HECHO";
    }
    if($row['estado']=="A")
    {
      $estado = "POR HACER";
    }
    $json[] =array(
         'id' => $row['id'],
         'nombre_proveedor' => $row['nombre_proveedor'],
         'estado' => $estado,
         'nombre' => $row['nombre'],
         'fecha_registro' => $row['fecha_registro'],
         'valor' => "$".$row['valor']
     );
  }
  echo json_encode($json);
 }

?>
