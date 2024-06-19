<?php


error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();

if(isset($_SESSION['user'])){
  $tipo = $_SESSION['user']['tipo_usuario'];
  $id_us = $_SESSION['user']['id'];
    $cod_barra = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];

    $cod_barra = $_POST["cod_barra"];

    require_once '../../../../../conexion.php';

    //query
    $sql = "SELECT * FROM productos WHERE id_cl = $id_cl AND codigo_barra = '$cod_barra'";
    $resultado = $conexion->query($sql);;

    $cod_barra = 0;
    while($row = $resultado->fetch_array())
    {
      $cod_barra = 1;
    }
    echo $cod_barra;
}
else
{
  header('Location: ../');
}
?>
