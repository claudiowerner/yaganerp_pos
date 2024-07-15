<?php

session_start();


  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);

  error_reporting(E_ALL);

  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  

  require_once '../../../../conexion.php';



  $json = array();
	//query
	$sql = "SELECT YEAR(fecha_pago) AS año_inicial
  FROM ventas 
  WHERE id_cl = $id_cl
  AND id_venta = 1
  GROUP BY fecha_pago";
  $res = $conexion->query($sql);
  if($res->num_rows>0)
  {
    while($row = $res->fetch_array())
    {
      $json = array(
        "año_inicial" => $row["año_inicial"]
      );
    }
  }
  else
  {
    $json = array(
      "titulo" => "Aviso",
      "mensaje" => "Aún no existen ventas",
      "icono" => "warning"
    );
  }
  
  echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

?>
