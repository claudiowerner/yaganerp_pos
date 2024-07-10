<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();

if(isset($_SESSION['user'])){
  $tipo = $_SESSION['user']['tipo_usuario'];
  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  

  $clave = $_POST['clave'];

  require_once '../../../conexion.php';

  //query
  $sql = "SELECT * FROM autorizacion WHERE id_cl = '$id_cl' AND clave = $clave";
  $resultado = $conexion->query($sql);;

  $claveOk = 0;
  while($row = $resultado->fetch_array())
  {
    $claveOk = 1;
  }
  echo $claveOk;
}
else
{
  header('Location: ../');
}
?>
