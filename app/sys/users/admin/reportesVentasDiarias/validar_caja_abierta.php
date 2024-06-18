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

    //query
    $sql = "SELECT COUNT(id) AS n_cajas_abiertas FROM cajas WHERE id_cl = $id_cl AND estado = 'A'";
    $resultado = $conexion->query($sql);;

    $contador_caja = 0;
    while($row = $resultado->fetch_array())
    {
      $contador_caja = $row["n_cajas_abiertas"];
    }
    echo $contador_caja;
  }
}
else
{
  header('Location: ../');
}
?>
