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

    $nombre = $_GET['nombre'];
    $id_mesa = $_GET["nMesa"];

    //arreglo json
    $json = array();
    //query
    $consulta = "SELECT m.estado AS estado_mesa, u.id AS id_ubic  FROM ubicaciones u 
    JOIN mesas m ON m.ubicacion = u.id WHERE u.id_cl = 1 
    AND u.nombre = '$nombre' 
    AND m.id = $id_mesa";
    $resultado = $conexion->query($consulta);
    $id_salida = "";
    if ($resultado->num_rows > 0)
    {
      $json = array();
      while ($row = $resultado->fetch_array())
      {
        $json[] =array(
          "estado_mesa" => $row["estado_mesa"],
          "id_ubic" => $row["id_ubic"]
        );
      }
      echo json_encode($json);
    }
    else
    {
      echo die("Error al obtener ID de ubicación: ". mysqli_error($conexion));
    }
  }
}
else
{
  header('Location: ../');
}
?>
