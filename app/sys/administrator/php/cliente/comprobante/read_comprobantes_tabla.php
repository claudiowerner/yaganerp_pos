<?php


  error_reporting(E_ALL);
  ini_set('display_errors', 'On');
  session_start();
  require_once '../../../../conexion.php';
  $id_cl = $_POST["id_cl"];
  
  //query
  $sql =
  "SELECT id, nombre_archivo, dir_archivo, 
  DATE_FORMAT(fecha_carga, '%d-%m-%Y') AS fecha_carga
  FROM comprobantes 
  WHERE id_cl = '$id_cl'";
  $res = $conexion->query($sql);
  $filas = $res->num_rows;
  if ($filas > 0){
    $json = array();
    while ($row = $res->fetch_array())
    {
      $json[] =array(
        "resultados" => $filas,
        'id' => $row['id'],
        'nombre_archivo' => $row['nombre_archivo'],
        'dir_archivo' => $row['dir_archivo'],
        'fecha_carga' => $row['fecha_carga']
      );
    };
  }
  else
  {
    $json = array(
      "resultados" => 0,
      "mensaje" => "Sin comprobantes o pagos registrados."
    );
  }
  echo json_encode($json, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
?>
