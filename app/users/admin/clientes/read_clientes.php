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
    "SELECT cln.id, cln.rut, cln.nombre, cln.apellido, cln.estado, us.nombre AS nombre_usuario, cln.fecha_registro
    FROM clientes_negocio cln
    JOIN usuarios us 
    ON cln.creado_por = us.id
    WHERE cln.id_cl = $id_cl";
    $resultado = $conexion->query($consulta);
    if ($resultado->num_rows > 0){
      $json = array();
      while ($row = $resultado->fetch_array())
      {

        $estado = $row['estado'];
        if($estado == "S")
        {
          $estado="ACTIVO";
        }
        if($estado == "N")
        {
          $estado="INACTIVO";
        };

        $json[] =array(
          'id' => $row['id'],
          'rut' => ($row['rut']),
          'nombre' => ($row['nombre']),
          'apellido' => ($row['apellido']),
          'estado' =>  $estado,
          'nombre_usuario' => $row['nombre_usuario'],
          'fecha_registro' => $row['fecha_registro']
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
