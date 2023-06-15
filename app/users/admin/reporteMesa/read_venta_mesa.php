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
  "SELECT mesa AS num_mesa, nom_mesa, COUNT(mesa) AS ventas_mesa, 
  SUM(valor+propina) AS valor_total FROM correlativo WHERE id_cl = $id_cl GROUP BY nom_mesa ORDER BY valor_total DESC";

  $resultado = $conexion->query($consulta);
  $json = array();
    while ($row = $resultado->fetch_array()) {
      $json[] =array(
              'num_mesa' => $row['num_mesa'],
              'nom_mesa' => $row['nom_mesa'],
              'ventas_mesa' => $row['ventas_mesa'],
              'valor_total' => $row['valor_total']
            );
    };
  echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

?>
