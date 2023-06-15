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
    $piso = 1;
    $idMesa = $_POST["idMesa"];

    require_once '../../../../conexion.php';

    //Actualización estado de mesa de ocupado a desocupado
    $sql = "SELECT nom_mesa FROM mesas WHERE id_cl = '$id_cl' AND id = '$idMesa'";
    $resultado = mysqli_query($conexion, $sql);

    while($row = $resultado->fetch_array())
    {
      echo $row["nom_mesa"];
    } 

    
}
else
{
  header('Location: ../');
}
?>
