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
    $consulta =
    "SELECT c.id, c.nom_caja, 
    u.nombre AS nom_usuario,
    c.estado, c.fecha_reg 
    FROM cajas c 
    JOIN usuarios u ON u.id=c.creado_por 
    WHERE c.id_cl = '$id_cl'";
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
        if($estado=="N")
        {
          $estado = "INACTIVO";
        }
        if($estado=="A")
        {
          $estado = "OCUPADO";
        }
        $json[] =array(
          'id' => $row['id'],
          'nombre' => $row['nom_caja'],
          'estado' => $estado,
          'creado_por' => $row['nom_usuario'],
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
