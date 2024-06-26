<?php


error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();

if(isset($_SESSION['user'])){
  $tipo = $_SESSION['user']['tipo_usuario'];
  $id_us = $_SESSION['user']['id'];
    $nombre = $_SESSION['user']["nombre"];
    $id_cl = $_SESSION['user']["id_cl"];
    
    $rut = $_POST["rut"];
    $json = array();

    require_once '../../../../../conexion.php';

    //query
    $sql = 
    "SELECT rut, nombre, apellido 
    FROM clientes_negocio
    WHERE id_cl = $id_cl
    AND rut LIKE '%$rut%'";
    $resultado = $conexion->query($sql);;
    if ($resultado->num_rows > 0)
    {
      while ($row = $resultado->fetch_array()) {
        $json[] =array(
          'rut' => $row['rut'],
          'nombre' => ($row['nombre']),
          'apellido' => ($row['apellido'])
        );
      };
    }
    echo json_encode($json);
  }
  else
  {
    header('Location: ../');
  }
?>
