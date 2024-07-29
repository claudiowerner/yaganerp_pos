<?php

session_start();


  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];


	require_once '../../../../../../../conexion.php';
  $num_pedidos = 0;
  $pedidos_hechos = 0;
  $pedidos_por_hacer = 0;
  $pedidos_pagados = 0;
  $pedidos_por_pagar = 0;
  $monto_pagado = 0;
  $monto_por_pagar = 0;
  $resultado = 0;
	/* -------------------------------- SELECCIONAR NÚMERO DE PEDIDOS ACTIVOS ---------------------------- */
	$sql = "SELECT * FROM pedidos 
  WHERE id_cl = $id_cl 
  AND estado!='N'";
  $res = $conexion->query($sql);
  $num_pedidos = $res -> num_rows;
  ;
  /* -------------------------------- SELECCIONAR PEDIDOS HECHOS Y SIN HACER ---------------------------- */
  $sql = "SELECT * FROM pedidos 
  WHERE id_cl = '$id_cl' 
  AND estado='C'";
  $res = $conexion->query($sql);
  $pedidos_hechos = $res->num_rows;
  

  $sql = "SELECT * FROM pedidos 
  WHERE id_cl = '$id_cl' 
  AND estado='A'";
  $res = $conexion->query($sql);
  $pedidos_por_hacer = $res->num_rows;
  

/* -------------------------------- SELECCIONAR PEDIDOS PAGADOS Y NO PAGADOS ---------------------------- */
//pedidos pagados
  $sql = "SELECT * FROM pedidos 
  WHERE id_cl = $id_cl 
  AND estado!='N' 
  AND estado_pago = 'C'";
  $res = $conexion->query($sql);
  $pedidos_pagados = $res->num_rows;
  

//pedidos por pagar
  $sql = "SELECT * FROM pedidos 
  WHERE id_cl = $id_cl 
  AND estado!='N' 
  AND estado_pago = 'A'";
  $res = $conexion->query($sql);
  $pedidos_por_pagar = $res->num_rows;
  


/* --------------------------------- SELECCIONAR MONTO PAGADO Y POR PAGAR ------------------------------ */
  //monto pagado
  $sql = "SELECT SUM(pd.valor*pd.cantidad) AS valor
  FROM pedidos_detalle pd
  JOIN pedidos p
  ON p.id = pd.id_pedido
  WHERE p.id_cl = $id_cl
  AND p.estado!='N' 
  AND p.estado_pago = 'C'";
  $res = $conexion->query($sql);
  
  if($res->num_rows!=0)
  {
    $resultado = $res->fetch_array();
    $monto_pagado = $resultado["valor"];
    
  }

  //monto por pagar
  $sql = "SELECT SUM(pd.valor*pd.cantidad) AS valor
  FROM pedidos_detalle pd
  JOIN pedidos p
  ON p.id = pd.id_pedido
  WHERE p.id_cl = $id_cl
  AND p.estado!='N' 
  AND p.estado_pago = 'A'";
  $res = $conexion->query($sql);

  if($res->num_rows!=0)
  {
    $resultado = $res->fetch_array();
    if($resultado["valor"]!=""||$resultado["valor"]!=null)
    {
      $monto_por_pagar = $resultado["valor"];
    }
    
  }

  $json = array(
    "num_pedidos" => $num_pedidos,
    "pedidos_hechos" => $pedidos_hechos,
    "pedidos_por_hacer" => $pedidos_por_hacer,
    "pedidos_pagados" => $pedidos_pagados,
    "pedidos_por_pagar" => $pedidos_por_pagar,
    "monto_pagado" => $monto_pagado,
    "monto_por_pagar" => $monto_por_pagar
  );

  echo json_encode($json)
?>
