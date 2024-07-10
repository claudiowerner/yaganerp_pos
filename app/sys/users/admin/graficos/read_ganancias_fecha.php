<?php

  session_start();

  if(isset($_SESSION['user']))
  {
    $tipo = $_SESSION['user']['tipo_usuario'];
    if($tipo == 3)
    {
      header('Location: ../');
    }
  }
  else
  {
    header('Location: ../');
  }


  $id_us = $_SESSION['user']['id'];
  $nombre = $_SESSION['user']["nombre"];
  $id_cl = $_SESSION['user']["id_cl"];
  


  require_once '../../../conexion.php';



	//query
	$sql = 
  "SELECT date_format(fecha_cierre, '%d/%m/%Y') AS fecha,
  date_format(fecha_cierre, '%Y-%m-%d') AS fecha_formato_sql
  FROM correlativo 
  WHERE estado = 'C' 
  AND fecha_cierre!='0000-00-00'
  GROUP BY(date_format(fecha_cierre, '%d/%m/%Y')) 
  ORDER BY (date_format(fecha_cierre, '%m')) ASC";
  $resultado = $conexion->query($sql);;
  if ($resultado->num_rows > 0)
  {
    $json = array();
    while ($row = $resultado->fetch_array()) 
    {
      $json[] =array(
        'fecha' => $row['fecha'],
        'fecha_formato_sql' => $row['fecha_formato_sql']
      );
    }
    echo json_encode($json);
 }

?>
