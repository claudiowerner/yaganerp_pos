<?php

session_start();


  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  $piso = 1;


  require_once '../../../../../conexion.php';

	//query
	$sql = 
  "SELECT SUM(valor*cantidad) AS valor, p.fac_con_iva
  FROM pedidos_detalle pd
  JOIN pedidos p 
  ON p.id = pd.id_pedido
  WHERE pd.id_cl = $id_cl
  AND p.estado = 'C'
  GROUP BY pd.id";

  $resultado = $conexion->query($sql);;
  if ($resultado->num_rows > 0){
    $valor_con_iva = 0;
    $valor_sin_iva = 0;
    while ($row = $resultado->fetch_array())
    {
      if($row["fac_con_iva"]=="N")
      {
        $valor_con_iva = round($valor_con_iva + $row["valor"]*1.19);
      }
      else
      {
        $valor_sin_iva = $valor_sin_iva + $row["valor"];
      }
    }
    echo ($valor_con_iva+$valor_sin_iva);
  }
  else
  {
    echo "Sin pedidos registrados";
  }

?>
