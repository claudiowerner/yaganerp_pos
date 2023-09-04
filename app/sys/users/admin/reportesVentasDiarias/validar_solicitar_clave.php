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
    $piso = 1;

    require_once '../../../conexion.php';

    //query
    $consulta = 
    "SELECT estado 
    FROM autorizacion 
    WHERE id_cl = $id_cl;";
    $resultado = $conexion->query($consulta);

    while($row = $resultado->fetch_array())
    {
      echo $row["estado"];
    }
  }
}
else
{
  header('Location: ../');
}
?>
