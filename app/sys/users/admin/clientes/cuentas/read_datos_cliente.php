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
    "SELECT nombre, apellido 
    FROM clientes_negocio 
    WHERE id_cl = $id_cl
    AND rut = '$rut'";
    $resultado = $conexion->query($consulta);
    $json= array();
    while ($row = $resultado->fetch_array())
    {
      $json[] =array(
          'nombre' => ($row['nombre']),
          'apellido' => ($row['apellido'])
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
