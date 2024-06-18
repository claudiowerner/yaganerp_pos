<?php


error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();

if(isset($_SESSION['user'])){
  $tipo = $_SESSION['user']['tipo_usuario'];
  $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    $piso = 1;

    require_once '../../../../conexion.php';

    //query
    $sql = 
    "SELECT estado FROM stock_minimo_producto 
    WHERE id_cl = $id_cl";
    $resultado = $conexion->query($sql);;

    $estado = 0;
    while($row = $resultado->fetch_array())
    {
      $estado = $row["estado"];
    }
    echo $estado;
}
else
{
  header('Location: ../');
}
?>
