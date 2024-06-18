<?php


error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();
require_once '../../../conexion.php';

    //query
    $sql =
    "SELECT * FROM giros";
    $resultado = $conexion->query($sql);;
    if ($resultado->num_rows > 0){
      $json = array();
      while ($row = $resultado->fetch_array())
      {
        $json[] =array(
          'id' => $row['id'],
          'nombre' => $row['nombre']
        );
      };
      echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
    }
    else
    {
      echo die("Error al agregar categoría: ". mysqli_error($conexion));
    }
?>
