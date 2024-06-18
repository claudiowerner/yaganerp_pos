<?php

  session_start();

  if(isset($_SESSION['user']))
  {
    $tipo = $_SESSION['user']['tipo_usuario'];
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    $piso = 1;


    require_once '../../../../conexion.php';

    //query
    $estado = "";


    $sql = "SELECT estado FROM autorizacion WHERE id_cl = $id_cl" ;
    $resultado = $conexion->query($sql);;
    $json = array();

    while ($row = $resultado->fetch_array())
    {
      $estado = $row["estado"];
    };

    echo $estado;
  }

  else
  {
    header('Location: ../');
  }
?>
