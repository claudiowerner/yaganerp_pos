<?php

  session_start();

  if(isset($_SESSION['user']))
  {
    $tipo = $_SESSION['user']['tipo_usuario'];
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    $piso = 1;
    $caja = $_POST['caja'];
    $id_cierre = $_POST['id_cierre'];


    require_once '../../../../conexion.php';

    //query
    $sql = 
    "SELECT id
    FROM monto_caja 
    WHERE id_cl = $id_cl 
    AND id_caja = $caja 
    AND id_cierre = $id_cierre" ;
    $res = $conexion->query($sql);;
    echo $res->num_rows;
  }
  else
  {
    header('Location: ../');
  }
?>
