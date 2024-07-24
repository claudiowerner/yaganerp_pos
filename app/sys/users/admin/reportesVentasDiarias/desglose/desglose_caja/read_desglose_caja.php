<?php


  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);

  error_reporting(E_ALL);
  session_start();

  require_once '../../../../../conexion.php';
  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  

  $idCaja = $_GET['idCaja'];
  $idCierre = $_GET['idCierre'];
  

  $horaDesde = $_GET["horaDesde"];
  $horaHasta = $_GET["horaHasta"];

  if($horaDesde=="")
  {
    $horaDesde = "00:00:00";
  }

  if($horaHasta=="")
  {
    $horaHasta = "23:59:59";
  }

  $sql = 
    "SELECT v.id_venta, 
    cc.nombre, 
    u.nombre 
    AS creado_por,
    DATE_FORMAT(v.fecha, '%d-%m-%Y %H:%i:%s') AS fecha,
    DATE_FORMAT(v.fecha_pago, '%d-%m-%Y %H:%i:%s') AS fecha_pago ,
    mp.nombre_metodo_pago, 
    v.estado, SUM(v.valor) AS valor,
    v.descto
    FROM cierre_caja cc 
    JOIN correlativo corr ON cc.id = corr.id_cierre
    JOIN usuarios u ON u.id = cc.creado_por 
    JOIN ventas v ON corr.correlativo = v.id_venta
    JOIN metodo_pago mp ON mp.id = corr.forma_pago
    WHERE cc.id = '$idCierre'
    AND corr.caja = $idCaja
    AND v.estado = 'C'
    AND v.id_cl = '$id_cl'
    GROUP BY id_venta";

  $query = $conexion->query($sql);
  $valor = 0;
  $descto = 0;
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

    $valor = $row["valor"];
    $descto = $row["descto"];
    $valorDescto = ($valor*$descto)/100;
    $valorDesctoAplicado = $valor-$valorDescto;
    $valor_total = 0;

    if($descto == 0)
    {
        $valor_total = $valor;
    }
    else
    {
        $valor_total = $valorDesctoAplicado;
    }

    $json[] =array(
              'id_venta' => $row['id_venta'],
              'nombre' => $row['nombre'],
              'creado_por' => $row['creado_por'],
              'hasta' => $row['fecha_pago'],
              'estado' => $estado,
              'valor_total' => $valor_total,
              'metodo_pago' => strtoupper($row['nombre_metodo_pago'])
            );
  }
	echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
?>
