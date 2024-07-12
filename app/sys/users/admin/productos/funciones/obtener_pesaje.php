<?php


error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();

if(isset($_SESSION['user'])){
  $tipo = $_SESSION['user']['tipo_usuario'];
  if($tipo == 1){
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    

    require_once '../../../../conexion.php';
    
    $id_prod = $_POST["id"];

    //query
    $sql = 
    "SELECT pesaje 
    FROM productos 
    WHERE id_cl = '$id_cl'
    AND id_prod = '$id_prod' ";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0){
      $json = array();
    };
    echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

  }
}
else
{
  header('Location: ../');
}
?>
