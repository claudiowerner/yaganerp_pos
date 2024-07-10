<?php


error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();

if(isset($_SESSION['user']))
{
    $tipo = $_SESSION['user']['tipo_usuario'];
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    
    $nMesa = $_POST["nMesa"];

    require_once '../../../../../conexion.php';

    //query
    $sql = "SELECT * FROM ventas WHERE id_cl = $id_cl AND mesa = $nMesa AND estado = 'A'";
    $resultado = $conexion->query($sql);;

    $venta = 0;
    while($row = $resultado->fetch_array())
    {
      $venta = 1;
    }
    echo $venta;
}
else
{
  header('Location: ../');
}
?>
