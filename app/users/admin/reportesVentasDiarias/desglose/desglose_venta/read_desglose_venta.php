<?php


  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);

  error_reporting(E_ALL);
  session_start();

  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  $piso = 1;

  $idVenta = $_GET['idVenta'];

  require_once '../../../../../conexion.php';

	//query
  $sql = 
  "SELECT us.nombre, p.nombre_prod, caja.nom_caja, 
  SUM(v.cantidad) AS cantidad,
  mp.nombre_metodo_pago, 
  SUM(v.valor) AS valor, 
  c.estado AS estado_venta,
  v.estado AS estado_prod, v.fecha 
  FROM ventas v 
  JOIN metodo_pago mp ON mp.id = v.forma_pago
  JOIN correlativo c ON c.id = v.id_venta
  JOIN cajas caja ON caja.id = v.id_caja
  JOIN usuarios us ON us.id = v.usuario 
  JOIN productos p ON p.id_prod = v.producto 
  WHERE v.id_cl = $id_cl 
  AND v.id_venta = $idVenta 
  AND v.estado = 'C'
  GROUP BY p.id_prod";

  $query = mysqli_query($conexion, $sql);

  $json = Array();
  while($row = $query->fetch_array())
  {
    $estado_prod = $row['estado_prod'];
    $estado_venta = $row['estado_venta'];

    if($estado_prod=='A')
    {
      $estado_prod = 'POR PAGAR';
    }
    if($estado_prod=='C')
    {
      $estado_prod = 'CERRADO';
    }
    if($estado_prod=="N")
    {
      $estado_prod = "ANULADO";
    }


    if($estado_venta=='A')
    {
      $estado_venta = 'EN CURSO';
    }
    if($estado_venta=='C')
    {
      $estado_venta = 'CERRADO';
    }
    if($estado_venta=="N")
    {
      $estado_venta = "ANULADO";
    }
    $json[] =array(
              'nombre' => ($row['nombre']),
              'nom_caja' => $row['nom_caja'],
              'nombre_prod' => ($row['nombre_prod']),
              'cantidad' => $row['cantidad'],
              'valor' => round($row['valor']*0.81),
              'iva' => round($row['valor']*0.19),
              'valor_total' => $row['valor'],
              'estado_prod' => $estado_prod,
              'estado_venta' => $estado_venta,
              'metodo_pago' => $row['nombre_metodo_pago'],
              'fecha' => $row['fecha']
            );
  }
	echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
?>