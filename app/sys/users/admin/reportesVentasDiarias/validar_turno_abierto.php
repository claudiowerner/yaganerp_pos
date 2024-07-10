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
    

    require_once '../../../conexion.php';

    //query de ventas
    //query
    $sql = "SELECT * FROM cierre_caja WHERE id_cl = $id_cl AND estado = 'A'";
    $resultado = $conexion->query($sql);;

    $estado_caja = 0;
    while($row = $resultado->fetch_array())
    {
      $estado_caja = 1;
    }
    echo $estado_caja;
  }
}
else
{
  header('Location: ../');
}
?>
