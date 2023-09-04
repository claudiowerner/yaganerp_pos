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
    $id_prod = $_POST["id_prod"];

    require_once '../../../conexion.php';

    //query
    $consulta = 
    "SELECT um.id, p.pesaje 
    FROM productos p 
    JOIN unidades_medida um
    ON p.unidad_medida = um.id 
    WHERE p.id_prod = $id_prod
    AND p.id_cl = $id_cl";
    $resultado = $conexion->query($consulta);
    if ($resultado->num_rows > 0){
      $json = array();
      while ($row = $resultado->fetch_array())
      {
        $json[] =array(
          'id' => $row['id'],
          'pesaje' => $row["pesaje"]
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
