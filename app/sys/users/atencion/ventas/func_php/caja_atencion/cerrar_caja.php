<?php


error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();


require_once '../../../../../conexion.php';

if(isset($_SESSION['user']))
{
    $tipo = $_SESSION['user']['tipo_usuario'];
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    
    $idCaja = $_POST["idCaja"];
    
    //Actualización estado de mesa de ocupado a desocupado
    $sql = 
    "UPDATE cajas c
    JOIN correlativo corr
    ON c.id = corr.caja
    SET c.estado = 'S' ,
    corr.estado = 'C'
    WHERE c.id = $idCaja;";

    $r = $conexion->query($sql);

    if($r)
    {
      echo 1;
    }
    else
    {
      echo 0;
    }

}
else
{
  header('Location: ../');
}
?>
