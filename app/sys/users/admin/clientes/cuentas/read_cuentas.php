<?php


error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();


require_once '../../../../conexion.php';
if(isset($_SESSION['user'])){
  $tipo = $_SESSION['user']['tipo_usuario'];
  
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    
    $rut = $_GET["rut"];
    

    $sql = 
      "SELECT corr.correlativo, ccr.estado, 
      DATE_FORMAT(ccr.fecha_registro, '%d-%m-%Y') AS fecha, SUM(v.valor) AS valor
      FROM cuenta_corriente ccr 
      JOIN correlativo corr 
      ON corr.correlativo = ccr.id_venta
      JOIN ventas v 
      ON v.id_venta = corr.correlativo
      WHERE ccr.id_cl = $id_cl
      AND rut = '$rut'
      AND v.estado!='N'
      AND ccr.estado !='N'
      GROUP BY corr.correlativo";
    $resultado = $conexion->query($sql);;
    $json= array();
    while ($row = $resultado->fetch_array())
    {

        $json[] =array(
          'correlativo' => $row['correlativo'],
          'estado' =>  $row['estado'],
          'fecha' => ($row['fecha']),
          'valor' => ($row['valor'])
        );
    }
    echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
  
  
}
else
{
  header('Location: ../');
}
?>
