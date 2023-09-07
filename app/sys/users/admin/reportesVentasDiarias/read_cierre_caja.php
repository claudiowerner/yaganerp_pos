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
  $piso = 1;

  //variables para filtrar resultados de cierre de caja
  $desde = $_GET['desde'];
  $hasta = $_GET['hasta'];


  require_once '../../../conexion.php';

	//query
	$consulta = "SELECT cc.id AS id, cc.nombre 
  AS nombre, u.nombre as creado_por, 
  DATE_FORMAT(cc.desde, '%d-%m-%Y %H:%i:%s') AS desde, 
  DATE_FORMAT(cc.hasta, '%d-%m-%Y %H:%i:%s') AS hasta, cc.estado,  
  cc.valor_total FROM cierre_caja cc 
  JOIN usuarios u ON cc.creado_por = u.id 
  WHERE cc.id_cl = $id_cl 
  AND DATE_FORMAT(cc.desde, '%d-%m-%Y') LIKE '%$desde%' 
  AND DATE_FORMAT(cc.hasta, '%d-%m-%Y') LIKE '%$hasta%'";
  $resultado = $conexion->query($consulta);
  if ($resultado->num_rows > 0){
    $json = array();
    while ($row = $resultado->fetch_array()) {
      $estado = $row['estado'];

      if($estado=='A')
      {
        $estado = 'EN CURSO';
      }
      else
      {
        $estado = 'CERRADO';
      }

      $json[] =array(
              'id' => $row['id'],
              'nombre' => $row['nombre'],
              'creado_por' => $row['creado_por'],
              'desde' => $row['desde'],
              'hasta' => $row['hasta'],
              'estado' => $estado,
              'valor_total' => $row['valor_total'],
            );
    };
  echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
}

?>
