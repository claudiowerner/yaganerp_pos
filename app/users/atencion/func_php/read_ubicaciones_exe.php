<?php

session_start();

if(isset($_SESSION['user'])){
  $tipo = $_SESSION['user']['tipo_usuario'];


  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];


  require_once '../../../conexion.php';

  $id_piso = $_GET["id_piso"];

    //query
  $consulta = "SELECT id, nombre FROM ubicaciones WHERE id_cl = 1 AND piso = $id_piso ORDER BY id ASC";
  $resultado = $conexion->query($consulta);
  if ($resultado->num_rows > 0)
  {
    $json = array();
    while ($row = $resultado->fetch_array())
    {
      $json[] = array
      (
        'id' => $row['id'],
        'nombre' => $row['nombre']
      );
    }
   echo json_encode($json);
  }
  else
  {
    echo json_encode("s/r");
  }
}
else
{
  echo "error";
}


?>
