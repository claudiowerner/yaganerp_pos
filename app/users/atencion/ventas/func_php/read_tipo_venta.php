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

    $nMesa = $_GET["nMesa"];

    require_once '../../../../conexion.php';

    //query
    $consulta = "SELECT tipo_venta FROM correlativo WHERE id_cl = $id_cl AND estado = 'A' AND mesa = $nMesa";
    $resultado = $conexion->query($consulta);

    $claveOk = 0;
    while($row = $resultado->fetch_array())
    {
      echo $row["tipo_venta"];
    }
    
}
else
{
  header('Location: ../');
}
?>
