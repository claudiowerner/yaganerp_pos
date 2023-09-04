<?php


error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();

if(isset($_SESSION['user'])){
  $tipo = $_SESSION['user']['tipo_usuario'];
  $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];

    $nombre = $_POST["nombre"];

    require_once '../../../conexion.php';

    //query
    $consulta = "SELECT * FROM productos WHERE id_cl = 1 AND nombre_prod = '$nombre'";
    $resultado = $conexion->query($consulta);

    $nombre = 0;
    while($row = $resultado->fetch_array())
    {
      $nombre = 1;
    }
    echo $nombre;
}
else
{
  header('Location: ../');
}
?>
