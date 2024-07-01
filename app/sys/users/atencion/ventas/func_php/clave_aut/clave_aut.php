<?php


error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();

if(isset($_SESSION['user'])){
  $tipo = $_SESSION['user']['tipo_usuario'];
  $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];


    $json = array();

    $clave = $_POST['clave'];

    require_once '../../../../../conexion.php';

    //query
    $sql = "SELECT * FROM autorizacion WHERE id_cl = '$id_cl' AND clave = $clave";
    $res = $conexion->query($sql);

    if($res->num_rows>0)
    {
      $json = array(
        "clave_coincide" => true
      );
    }
    else
    {
      $json = array(
        "clave_coincide" => false
      );
    }
}
else
{
  header('Location: ../');
}
?>
