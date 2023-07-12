<?php

session_start();


  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);

  error_reporting(E_ALL);

  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  $piso = 1;

  require_once '../../../conexion.php';

	//query
	$consulta = 
  "SELECT c.nombre_cat, p.nombre_prod, sum(v.cantidad) AS cantidad, sum(v.valor) AS valor_total 
  FROM ventas v 
  JOIN productos p ON p.id_prod = v.producto 
  JOIN categorias c ON c.id = p.categoria 
  WHERE c.id_cl = $id_cl 
  GROUP BY p.id_prod 
  ORDER BY cantidad DESC";
  $resultado = $conexion->query($consulta);
  $json = array();
    while ($row = $resultado->fetch_array()) {
      $json[] =array(
              'nombre_cat' => $row['nombre_cat'],
              'nombre_prod' => $row['nombre_prod'],
              'cantidad' => $row['cantidad'],
              'valor_total' => $row['valor_total']
            );
    };
  echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

?>
