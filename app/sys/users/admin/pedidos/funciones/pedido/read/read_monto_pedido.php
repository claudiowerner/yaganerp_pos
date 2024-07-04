<?php

session_start();


  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  $piso = 1;


	require_once '../../../../../../conexion.php';

	//query
	$sql = 
  "SELECT SUM(valor*cantidad) AS valor	
  FROM pedidos_detalle pd
  JOIN pedidos p 
  ON p.id = pd.id_pedido
  WHERE pd.id_cl = $id_cl
  AND p.estado = 'C'
  AND pd.estado = 'S'";

  $resultado = $conexion->query($sql);;
  if ($resultado->num_rows > 0){
    
    while ($row = $resultado->fetch_array())
    {
      echo $row["valor"];
    }
  }
  else
  {
    echo "Sin pedidos registrados";
  }

?>
