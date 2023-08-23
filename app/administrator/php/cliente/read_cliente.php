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

    //query
    $consulta =
    "SELECT c.id, c.nombre, c.rut, c.estado, c.correo, c.telefono, pl.nombre AS plan_comprado, 
    DATE_FORMAT(fecha_pago, '%d-%m-%Y') AS fecha_pago 
    FROM cliente c
    JOIN planes pl
    ON pl.id = c.plan_comprado;";
    $resultado = $conexion->query($consulta);
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
          'rut' => $row['rut'],
          'estado' => $estado,
          'correo' => $row['correo'],
          'telefono' => $row['telefono'],
          'plan_comprado' => $row['plan_comprado'],
          'fecha_pago' => $row['fecha_pago']
        );
      };
      echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
    }
    else
    {
      echo die("Error al agregar categoría: ". mysqli_error($conexion));
    }

  }
}
else
{
  header('Location: ../');
}
?>
