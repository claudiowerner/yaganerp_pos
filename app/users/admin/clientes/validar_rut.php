<?php


error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();

if(isset($_SESSION['user'])){
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    $piso = 1;
    $rut = $_POST["rut"];

    require_once '../../../conexion.php';

    //query
    $consulta = 
    "SELECT * FROM clientes_negocio
    WHERE id_cl = $id_cl
    AND rut = '$rut'";
    $resultado = $conexion->query($consulta);

    echo $resultado->num_rows;
}
else
{
  header('Location: ../');
}
?>
