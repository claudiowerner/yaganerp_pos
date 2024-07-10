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
    
    $id_usu = $_POST["id_usu"];

    require_once '../../../../../conexion.php';

    //query
    $sql = "SELECT permisos FROM usuarios WHERE id_cl = $id_cl AND id = $id_usu;";
    $resultado = $conexion->query($sql);;
    if ($resultado->num_rows > 0){
      $json = array();
      while ($row = $resultado->fetch_array())
      {
        echo $row["permisos"];
      };
      }
    else
    {
      echo die("Error al obtener permisos: ". mysqli_error($conexion));
    }

  }
}
else
{
  header('Location: ../');
}
?>
