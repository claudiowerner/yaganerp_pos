<?php


error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();
require_once '../../../conexion.php';
require_once '../../../php/mb_encoding.php';

date_default_timezone_set('America/Santiago');
    //query
    $sql =
    "SELECT * FROM tipo_pago_cliente";
    $resultado = $conexion->query($sql);
    if ($resultado->num_rows > 0)
    {
      $json = array();
      while ($row = $resultado->fetch_array())
      {
        $json[] =array(
          'id' => $row['id'],
          'nombre' => mb_encoding($row['nombre'])
        );
      };
    }
    else
    {
      $json[] =array(
        'id' => 0,
        'nombre' => "SIN MÉTODOS DE PAGO"
      );
    }
    echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
?>
