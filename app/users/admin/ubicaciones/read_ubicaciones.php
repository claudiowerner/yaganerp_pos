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
    $consulta = "SELECT u.id, p.nombre, u.nombre AS ubicacion, 
    us.nombre AS creado_por, u.estado, u.fecha_reg FROM ubicaciones u 
    JOIN pisos p ON u.piso = p.id 
    JOIN usuarios us on us.id = u.creado_por where u.id_cl = $id_cl";
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
          'ubicacion' => $row['ubicacion'],
          'estado' => $estado,
          'creado_por' => $row['creado_por'],
          'fecha_reg' => $row['fecha_reg']
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
