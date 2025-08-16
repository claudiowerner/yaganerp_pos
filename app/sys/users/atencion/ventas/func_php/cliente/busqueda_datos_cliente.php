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
		require_once '../../../../../php/mb_encoding.php';

    //setear charset
    $conexion -> set_charset("utf8");
    //query
    $sql = 
    "SELECT rut, nombre, apellido, telefono
    FROM clientes_negocio
    WHERE id_cl = $id_cl
    AND rut LIKE '%$rut%'
    AND estado ='S'";
    $resultado = $conexion->query($sql);
    if ($resultado->num_rows > 0)
    {
      while ($row = $resultado->fetch_array()) {
        $json[] =array(
          'rut' => $row['rut'],
          'nombre' => mb_encoding($row['nombre']),
          'apellido' => mb_encoding($row['apellido']),
          'telefono' => mb_encoding($row['telefono']),
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
