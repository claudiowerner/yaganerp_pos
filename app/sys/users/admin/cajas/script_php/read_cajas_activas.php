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

    require_once '../../../../conexion.php';

    //query
    $consulta = "SELECT COUNT(id) AS cajas_activas FROM cajas WHERE id_cl = $id_cl AND estado!= 'N'";
    $resultado = $conexion->query($consulta);
    if ($resultado->num_rows > 0)
    {
      $imprimir = $resultado->fetch_assoc();
      echo $imprimir["cajas_activas"];
    }
    else
    {
      echo die("Cajas activas activos: ".mysqli_error($conexion));
    }

  }
}
else
{
  header('Location: ../');
}
?>
