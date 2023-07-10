<?php


  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);

  error_reporting(E_ALL);
  session_start();

  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  $piso = 1;

  $idCaja = $_GET['idCaja'];
  

  $horaDesde = $_GET["horaDesde"];
  $horaHasta = $_GET["horaHasta"];  

  require_once '../../../../conexion.php';

	//query
  $sql = 
  "SELECT v.id_venta, 
  cc.nombre, 
  u.nombre 
  AS creado_por,
  v.nom_caja, 
  DATE_FORMAT(v.fecha, '%d-%m-%y %H:%i:%s') AS fecha,
  DATE_FORMAT(v.fecha_pago, '%d-%m-%y %H:%i:%s') AS fecha_pago , 
  v.estado,
  SUM(v.valor) AS valor_total
  FROM cierre_caja cc 
  JOIN usuarios u ON u.id = cc.creado_por 
  JOIN ventas v ON cc.id=v.id_caja 
  WHERE cc.id = '$idCaja'
  AND v.estado = 'C'
  AND DATE_FORMAT(fecha, '%H:%i-%s') LIKE '%$horaDesde%'
  AND DATE_FORMAT(v.fecha_pago, '%H:%i-%s') LIKE '%$horaHasta%'
  GROUP BY id_venta";

  $query = mysqli_query($conexion, $sql);

  $json = Array();
  while($row = $query->fetch_array())
  {
    $estado = $row['estado'];

      if($estado=='A')
      {
        $estado = 'EN CURSO';
      }
      if($estado=="N")
      {
        $estado = 'ANULADO';
      }
      if($estado=="C")
      {
        $estado = 'CERRADO';
      }
    $json[] =array(
              'id_venta' => $row['id_venta'],
              'nombre' => $row['nombre'],
              'creado_por' => $row['creado_por'],
              'nom_caja' => $row['nom_caja'],
              'desde' => $row['fecha'],
              'hasta' => $row['fecha_pago'],
              'estado' => $estado,
              'valor_total' => $row['valor_total']
            );
  }
	echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
?>
