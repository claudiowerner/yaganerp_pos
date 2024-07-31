<?php


  error_reporting(E_ALL);
  ini_set('display_errors', 'On');
  session_start();
  require_once '../../../conexion.php';
  $id_cl = $_POST["id_cl"];
  
  //query
  $sql =
  "SELECT * FROM comprobantes WHERE id_cl = '$id_cl'";
  $resultado = $conexion->query($sql);
  if ($resultado->num_rows > 0){
    $json = array();
    while ($row = $resultado->fetch_array())
    {
      $json[] =array(
        'id' => $row['id'],
        'nombre_archivo' => $row['nombre_archivo'],
        'dir_archivo' => $row['dir_archivo'],
        'fecha_carga' => $row['fecha_carga']
      );
    };
    echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
  }
  else
  {
    echo die("Error al agregar categoría: ". mysqli_error($conexion));
  }
?>
