<?php


  error_reporting(E_ALL);
  ini_set('display_errors', 'On');
  session_start();
  date_default_timezone_set('America/Santiago');
  require_once '../../../../conexion.php';
  $id_cl = $_POST["id_cl"];
  
  //query
  $sql =
  "SELECT c.id,
  DATE_FORMAT(pc.fecha_desde, '%d-%m-%Y') AS fecha_desde,
  DATE_FORMAT(pc.fecha_hasta, '%d-%m-%Y') AS fecha_hasta,
  c.id_pago,
  c.nombre_archivo, c.dir_archivo, 
  DATE_FORMAT(c.fecha_carga, '%d-%m-%Y') AS fecha_carga
  FROM comprobantes c
  JOIN pago_cliente pc
  ON pc.id = c.id_pago
  WHERE c.id_cl = '$id_cl'";
  $res = $conexion->query($sql);
  $filas = $res->num_rows;
  $nro_fila = 0;
  if ($filas > 0){
    $json = array();
    while ($row = $res->fetch_array())
    {
      $nro_fila++;
      $json[] =array(
        "resultados" => $filas,
        "nro_fila" => $nro_fila,
        'id_pago' => $row['id_pago'],
        'id' => $row['id'],
        'nombre_archivo' => $row['nombre_archivo'],
        'periodo' => $row["fecha_desde"]."<->".$row["fecha_hasta"],
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
