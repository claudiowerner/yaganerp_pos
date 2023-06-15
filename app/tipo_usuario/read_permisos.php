<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 'On');
  session_start();

  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  $piso = 1;
  
  require_once '../conexion.php';

  $arreglo = "";//acá se guardan los datos emanados desde la base de datos

  $sql = "SELECT permisos FROM usuarios WHERE id_cl = '$id_cl' AND id = '$id_us'";
  $res = $conexion->query($sql);
  
  while($row=$res->fetch_array())
  {
    $arreglo = $row["permisos"];
  }

  $datos = explode(",",$arreglo);
  echo json_encode($datos);
?>
