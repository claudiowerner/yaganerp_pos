<?php


error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();

require_once '../../../../conexion.php';
if(isset($_SESSION['user'])){
  $tipo = $_SESSION['user']['tipo_usuario'];
  if($tipo == 1)
  {
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    
    $rut = $_POST["rut"];
    
    $consulta = 
    "SELECT * FROM cuenta_corriente ccr 
    JOIN correlativo corr 
    ON corr.correlativo = ccr.correlativo
    WHERE ccr.id_cl = 1
    AND rut = 19150634-0";
    $resultado = $conexion->query($consulta);
    $json= array();
    while ($row = $resultado->fetch_array())
    {
      $estado = $row['estado'];
      if($estado == "S")
      {
        $estado="ACTIVO";
      }
      if($estado == "N")
      {
        $estado="INACTIVO";
      };

        $json[] =array(
          'id' => $row['id'],
          'rut' => ($row['rut']),
          'nombre' => ($row['nombre']),
          'apellido' => ($row['apellido']),
          'estado' =>  $estado,
          'nombre_usuario' => $row['nombre_usuario'],
          'fecha_registro' => $row['fecha_registro']
        );
    }
    echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
  }
  
}
else
{
  header('Location: ../');
}
?>
