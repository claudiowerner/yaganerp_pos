<?php


error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();
date_default_timezone_set('America/Santiago');
    require_once '../../../conexion.php';
    //query
    $sql =
    "SELECT * FROM planes";
    $resultado = $conexion->query($sql);;
    if ($resultado->num_rows > 0){
      $json = array();
      while ($row = $resultado->fetch_array())
      {
        $estado = $row['estado'];
        if($estado=="S")
        {
          $estado = "ACTIVO";
        }
        else
        {
          $estado = "INACTIVO";
        }
        $json[] =array(
          'id' => $row['id'],
          'nombre' => $row['nombre'],
          'estado' => $estado,
          'usuarios' => $row['usuarios'],
          'cajas' => $row['cajas'],
          'valor' => "$".$row['valor']
        );
      };
      echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
    }
    else
    {
      echo die("Error al agregar categoría: ". mysqli_error($conexion));
    }
?>
