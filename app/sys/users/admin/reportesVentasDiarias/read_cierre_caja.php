<?php

session_start();

if(isset($_SESSION['user']))
{
  $tipo = $_SESSION['user']['tipo_usuario'];
  if($tipo == 3)
  {
    header('Location: ../');
  }
}
else
{
  header('Location: ../');
}


  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  

  //variables para filtrar resultados de cierre de caja
  $desde = $_GET['desde'];
  $hasta = $_GET['hasta'];


  require_once '../../../conexion.php';
  //arrays
  $arrId = array();
  $arrNombreCaja = array();
  $arrNombreUsuario = array();
  $arrFechaDesde = array();
  $arrFechaHasta = array();
  $arrEstado = array();
  $arrValor = array();
  $json = array();

	//relleno de arrays con información
  $sql = "SELECT cc.id, cc.nombre, u.nombre AS nombre_usuario,
  DATE_FORMAT(cc.desde, '%d-%m-%Y %H:%i:%s') AS desde, 
  DATE_FORMAT(cc.hasta, '%d-%m-%Y %H:%i:%s') AS hasta, 
  cc.estado AS estado
  FROM cierre_caja cc 
  JOIN usuarios u 
  ON cc.creado_por = u.id 
  WHERE cc.id_cl = '$id_cl'
  AND DATE_FORMAT(cc.desde, '%d-%m-%Y') LIKE '%$desde%' 
  AND DATE_FORMAT(cc.hasta, '%d-%m-%Y') LIKE '%$hasta%'
  ORDER BY id DESC";
  $res = $conexion->query($sql);;
  while($row = $res->fetch_array())
  {
    $arrId[] = $row["id"];
    $arrNombreCaja[] = $row["nombre"];
    $arrNombreUsuario[] = $row["nombre_usuario"];
    $arrFechaDesde[] = $row["desde"];
    $arrFechaHasta[] = $row["hasta"];
    $arrEstado[] = $row["estado"];
  }

  //consultar por valor de turno
  $contador = count($arrId);
  
  for($i=0;$i<$contador;$i++)
  {
    $id = $arrId[$i];
    $sql = "SELECT SUM(v.valor-((v.valor*v.descto)/100)) AS valor FROM correlativo corr 
    JOIN ventas v
    ON v.id_venta = corr.correlativo
    WHERE corr.id_cierre = $id
    AND v.estado = 'C'";
    $res = $conexion->query($sql);;
    while($row = $res->fetch_array())
    {
      if($row["valor"]=="")
      {
        $arrValor[] = 0;
      }
      else
      {
        $arrValor[] = $row["valor"];
      }
    }
  }
  for($i=0;$i<$contador;$i++)
  {
    $json[] = array(
      "id"=> $arrId[$i],
      "nombre"=> $arrNombreCaja[$i],
      "creado_por"=> $arrNombreUsuario[$i],
      "desde"=> $arrFechaDesde[$i],
      "hasta"=> $arrFechaHasta[$i],
      "estado"=> $arrEstado[$i],
      "valor_total"=> $arrValor[$i]
    );
  }


  echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);



?>
