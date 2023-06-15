<?php


error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();

if(isset($_SESSION['user'])){
  $tipo = $_SESSION['user']['tipo_usuario'];
  if($tipo == 1){
    $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    $piso = 1;
    $ubic = $_GET["ubic"];
    require_once '../../../conexion.php';

    //query
    $consulta = "SELECT count(id) AS num_mesa FROM mesas WHERE id_cl=$id_cl AND ubicacion=$ubic";
    $resultado = $conexion->query($consulta);
    if ($resultado->num_rows > 0){
      $json = array();
      while ($row = $resultado->fetch_array())
      {
        echo ($row["num_mesa"]+1);
      };
    }
    else
    {
      echo die("Error al leer número de mesa: ". mysqli_error($conexion));
    }

  }
}
else
{
  header('Location: ../');
}
?>
