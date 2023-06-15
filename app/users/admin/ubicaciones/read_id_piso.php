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

    require_once '../../../conexion.php';

    $nombre = $_GET['nombre'];

    //query
    $consulta = "SELECT id FROM pisos WHERE id_cl = 1 AND nombre = '$nombre'";
    $resultado = $conexion->query($consulta);

    if ($resultado->num_rows > 0){
      $json = array();
      while ($row = $resultado->fetch_array())
      {
        echo $row['id'];
      }
    }
    else
    {
      echo die("Error al obtener ID de piso: ". mysqli_error($conexion));
    }

  }
}
else
{
  header('Location: ../');
}
?>
