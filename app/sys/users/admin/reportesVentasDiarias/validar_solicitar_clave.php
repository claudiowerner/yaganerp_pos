<?php


error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();

$id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    $piso = 1;
    $mostrar = "N";

    require_once '../../../conexion.php';

    //query
    $sql = 
    "SELECT estado 
    FROM autorizacion 
    WHERE id_cl = $id_cl;";
    $resultado = $conexion->query($sql);;

    if($resultado->num_rows>0)
    {
      while($row = $resultado->fetch_array())
      {
        $mostrar = $row["estado"];
      }
    }
    echo $mostrar;
  
?>
