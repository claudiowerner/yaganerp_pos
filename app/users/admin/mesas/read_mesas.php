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
    $consulta = "SELECT m.id, m.num_mesa, m.nom_mesa, u.nombre as ubicacion, m.estado, us.nombre as nom_us, m.fecha_reg FROM mesas m JOIN ubicaciones u ON u.id = m.ubicacion JOIN usuarios us ON m.usuario = us.id WHERE m.id_cl = $id_cl";
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
          'num_mesa' => $row['num_mesa'],
          'nom_mesa' => $row['nom_mesa'],
          'ubicacion' => $row['ubicacion'],
          'estado' => $estado,
          'nom_us' => $row['nom_us'],
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
